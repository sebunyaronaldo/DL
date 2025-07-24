<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Withdraw;

/**
 * WithdrawSearch represents the model behind the search form about `app\models\Withdraw`.
 */
class WithdrawSearch extends Withdraw
{
    public function rules()
    {
        return [
            [['withdraw_id', 'user_id'], 'integer'],
            [['withdraw_number', 'withdraw_name', 'withdraw_amount', 'withdraw_date', 'withdraw_userid', 'withdraw_status'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Withdraw::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'withdraw_id' => $this->withdraw_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'withdraw_number', $this->withdraw_number])
            ->andFilterWhere(['like', 'withdraw_name', $this->withdraw_name])
            ->andFilterWhere(['like', 'withdraw_amount', $this->withdraw_amount])
            ->andFilterWhere(['like', 'withdraw_date', $this->withdraw_date])
            ->andFilterWhere(['like', 'withdraw_userid', $this->withdraw_userid])
            ->andFilterWhere(['like', 'withdraw_status', $this->withdraw_status]);

        return $dataProvider;
    }
}
