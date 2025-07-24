<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Deposit;

/**
 * DepositSearch represents the model behind the search form about `app\models\Deposit`.
 */
class DepositSearch extends Deposit
{
    public function rules()
    {
        return [
            [['deposit_id', 'deposit_mm_number', 'depositor_userid'], 'integer'],
            [['deposit_refer', 'deposit_email', 'depositor_name', 'deposit_amount'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Deposit::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'deposit_id' => $this->deposit_id,
            'deposit_mm_number' => $this->deposit_mm_number,
            'depositor_userid' => $this->depositor_userid,
        ]);

        $query->andFilterWhere(['like', 'deposit_refer', $this->deposit_refer])
            ->andFilterWhere(['like', 'deposit_email', $this->deposit_email])
            ->andFilterWhere(['like', 'depositor_name', $this->depositor_name])
            ->andFilterWhere(['like', 'deposit_amount', $this->deposit_amount]);

        return $dataProvider;
    }
}
