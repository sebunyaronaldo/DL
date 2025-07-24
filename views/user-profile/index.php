<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\UserProfileSearch $searchModel
 */

$this->title = Yii::t('app', 'User List');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-index">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'User Profile',
]), ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <!-- on your view layout file HEAD section -->
<!--link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" -->


    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'user_profile_id',
            //'user_id',
            'fname',
            'lname',
            'mname',
            'mm_number', 
            'mm_number_alt', 
            'user_email:email', 
            'location', 
//            'reminder', 
//            'group_frequency', 
            'balance', 
            [
                'attribute' => 'group_id',
                'label' => 'Group',
                'format' => 'raw',
                'value' => function($model) {
                    $group = \app\models\Group::findOne($model->group_id);
                    return $group ? \yii\helpers\Html::a($group->group_name, ['/group/view', 'id' => $group->group_id]) : null;
                }
            ],
            [
                'attribute' => 'mpool_id',
                'label' => 'Money Pool',
                'format' => 'raw',
                'value' => function($model) {
                    $mpool = \app\models\MoneyPool::findOne($model->mpool_id);
                    return $mpool ? \yii\helpers\Html::a($mpool->mpool_title, ['/money-pool/view', 'id' => $mpool->mpool_id]) : null;
                }
            ],
            'user_personal_invite', 

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            Yii::$app->urlManager->createUrl(['user-profile/view', 'id' => $model->user_profile_id, 'edit' => 't']),
                            ['title' => Yii::t('yii', 'Edit'),]
                        );
                    }
                ],
            ],
        ],
        'responsive' => true,
        'hover' => true,
        'condensed' => true,
        'floatHeader' => true,

        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
            'type' => 'info',
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
            'showFooter' => false
        ],
    ]); Pjax::end(); ?>

</div>
