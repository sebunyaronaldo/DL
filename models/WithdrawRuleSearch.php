<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WithdrawRule;

/**
 * WithdrawRuleSearch represents the model behind the search form about `app\models\WithdrawRule`.
 */
class WithdrawRuleSearch extends WithdrawRule
{
    public function rules()
    {
        return [
            [['withdraw_rule_id'], 'integer'],
            [['withdraw_rule', 'withdraw_condition'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = WithdrawRule::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'withdraw_rule_id' => $this->withdraw_rule_id,
        ]);

        $query->andFilterWhere(['like', 'withdraw_rule', $this->withdraw_rule])
            ->andFilterWhere(['like', 'withdraw_condition', $this->withdraw_condition]);

        return $dataProvider;
    }
}
