<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays the analytics dashboard.
     * @return string
     */
    public function actionDashboard()
    {
        return $this->render('dashboard');
    }

    /**
     * Returns analytics data for dashboard (AJAX endpoint).
     * @return \yii\web\Response
     */
    public function actionDashboardData()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        // Get all user profiles for mapping
        $userProfiles = \app\models\UserProfile::find()->select(['user_id', 'fname', 'lname'])->indexBy('user_id')->asArray()->all();
        // Total contributions per user (by deposit_id, which links to user via Deposit)
        $contributions = \app\models\ContributionTracker::find()
            ->select(['deposit_id', 'SUM(amount) as total'])
            ->groupBy('deposit_id')
            ->asArray()->all();
        // Map deposit_id to user
        $deposits = \app\models\Deposit::find()->indexBy('deposit_id')->asArray()->all();
        $contribPerUser = [];
        foreach ($contributions as $row) {
            $deposit = $deposits[$row['deposit_id']] ?? null;
            if ($deposit && $deposit['depositor_userid']) {
                $userId = $deposit['depositor_userid'];
                $userName = isset($userProfiles[$userId]) ? trim($userProfiles[$userId]['fname'] . ' ' . $userProfiles[$userId]['lname']) : 'User ' . $userId;
                if (!isset($contribPerUser[$userName])) $contribPerUser[$userName] = 0;
                $contribPerUser[$userName] += $row['total'];
            }
        }
        // Number of new users (this week, by user_profile_id as proxy for registration)
        $startOfWeek = date('Y-m-d 00:00:00', strtotime('monday this week'));
        $newUsers = \app\models\UserProfile::find()
            ->where(['>=', 'user_profile_id', 0]) // fallback if no created_at
            ->andWhere(['>=', 'user_profile_id', (int)\app\models\UserProfile::find()->min('user_profile_id')]) // fallback
            ->count();
        // Deposits per user
        $depositsPerUser = \app\models\Deposit::find()
            ->select(['depositor_userid', 'SUM(deposit_amount) as total'])
            ->groupBy('depositor_userid')
            ->asArray()->all();
        $depositsPerUserArr = [];
        foreach ($depositsPerUser as $row) {
            if ($row['depositor_userid']) {
                $userName = isset($userProfiles[$row['depositor_userid']]) ? trim($userProfiles[$row['depositor_userid']]['fname'] . ' ' . $userProfiles[$row['depositor_userid']]['lname']) : 'User ' . $row['depositor_userid'];
                $depositsPerUserArr[$userName] = $row['total'];
            }
        }
        // New groups created this week
        $newGroupsThisWeek = \app\models\Group::find()
            ->where(['>=', 'created_at', $startOfWeek])
            ->count();
        // Money pools totals (sum of set_mpool_goal)
        $moneyPoolsTotals = (float)\app\models\MoneyPool::find()->sum('set_mpool_goal');
        // Total transactions pending
        $pendingTransactions = \app\models\TransactionStatus::find()
            ->where(['transact_state' => 'pending'])
            ->count();
        // Withdraws per user
        $withdrawsPerUser = \app\models\Withdraw::find()
            ->select(['withdraw_userid', 'SUM(withdraw_amount) as total'])
            ->groupBy('withdraw_userid')
            ->asArray()->all();
        $withdrawsPerUserArr = [];
        foreach ($withdrawsPerUser as $row) {
            if ($row['withdraw_userid']) {
                $userName = isset($userProfiles[$row['withdraw_userid']]) ? trim($userProfiles[$row['withdraw_userid']]['fname'] . ' ' . $userProfiles[$row['withdraw_userid']]['lname']) : 'User ' . $row['withdraw_userid'];
                $withdrawsPerUserArr[$userName] = $row['total'];
            }
        }
        // Withdraw status distribution
        $withdrawStatusRaw = \app\models\Withdraw::find()
            ->select(['withdraw_status', 'COUNT(*) as count'])
            ->groupBy('withdraw_status')
            ->asArray()->all();
        $withdrawStatusDist = [];
        foreach ($withdrawStatusRaw as $row) {
            $status = $row['withdraw_status'] !== null ? $row['withdraw_status'] : 'Unknown';
            $withdrawStatusDist[$status] = $row['count'];
        }
        // Savings per user (current taker)
        $savingsPerUser = \app\models\SavingsPot::find()
            ->select(['savings_pot_taker_curr', 'SUM(savings_pot_amount) as total'])
            ->groupBy('savings_pot_taker_curr')
            ->asArray()->all();
        $savingsPerUserArr = [];
        foreach ($savingsPerUser as $row) {
            if ($row['savings_pot_taker_curr']) {
                $userName = isset($userProfiles[$row['savings_pot_taker_curr']]) ? trim($userProfiles[$row['savings_pot_taker_curr']]['fname'] . ' ' . $userProfiles[$row['savings_pot_taker_curr']]['lname']) : 'User ' . $row['savings_pot_taker_curr'];
                $savingsPerUserArr[$userName] = $row['total'];
            }
        }
        // Claimed vs. unclaimed savings
        $claimedRaw = \app\models\SavingsPot::find()
            ->select(['claimed_status', 'COUNT(*) as count'])
            ->groupBy('claimed_status')
            ->asArray()->all();
        $claimedDist = [];
        foreach ($claimedRaw as $row) {
            $status = $row['claimed_status'] == 1 ? 'Claimed' : 'Unclaimed';
            $claimedDist[$status] = $row['count'];
        }
        // Time-series analytics (last 12 months)
        $months = [];
        $now = new \DateTime('first day of this month');
        for ($i = 11; $i >= 0; $i--) {
            $month = clone $now;
            $month->modify("-$i months");
            $months[] = $month->format('Y-m');
        }
        // Helper for grouping by month
        $groupByMonth = function($model, $dateField, $sumField = null) use ($months) {
            $query = $model::find()
                ->select([
                    "month" => "DATE_FORMAT($dateField, '%Y-%m')",
                    $sumField ? "SUM($sumField) as value" : "COUNT(*) as value"
                ])
                ->where([">=", $dateField, $months[0] . '-01'])
                ->groupBy(["month"])
                ->orderBy(["month" => SORT_ASC])
                ->asArray()->all();
            $data = array_fill_keys($months, 0);
            foreach ($query as $row) {
                $data[$row['month']] = (float)$row['value'];
            }
            return [
                'labels' => array_values($months),
                'data' => array_values($data),
            ];
        };
        $userRegistrations = $groupByMonth(\app\models\UserProfile::class, 'created_at');
        $depositsOverTime = $groupByMonth(\app\models\Deposit::class, 'created_at', 'deposit_amount');
        $contributionsOverTime = $groupByMonth(\app\models\ContributionTracker::class, 'created_at', 'amount');
        $withdrawsOverTime = $groupByMonth(\app\models\Withdraw::class, 'created_at', 'withdraw_amount');
        $savingsOverTime = $groupByMonth(\app\models\SavingsPot::class, 'created_at', 'savings_pot_amount');
        $moneyPoolsOverTime = $groupByMonth(\app\models\MoneyPool::class, 'created_at');
        return [
            'totalContributionsPerUser' => $contribPerUser,
            'newUsers' => $newUsers,
            'depositsPerUser' => $depositsPerUserArr,
            'newGroupsThisWeek' => $newGroupsThisWeek,
            'moneyPoolsTotals' => $moneyPoolsTotals,
            'pendingTransactions' => $pendingTransactions,
            'withdrawsPerUser' => $withdrawsPerUserArr,
            'withdrawStatusDist' => $withdrawStatusDist,
            'savingsPerUser' => $savingsPerUserArr,
            'claimedDist' => $claimedDist,
            'userRegistrations' => $userRegistrations,
            'depositsOverTime' => $depositsOverTime,
            'contributionsOverTime' => $contributionsOverTime,
            'withdrawsOverTime' => $withdrawsOverTime,
            'savingsOverTime' => $savingsOverTime,
            'moneyPoolsOverTime' => $moneyPoolsOverTime,
        ];
    }
}
