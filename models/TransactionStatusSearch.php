<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransactionStatus;

/**
 * TransactionStatusSearch represents the model behind the search form about `app\models\TransactionStatus`.
 */
class TransactionStatusSearch extends TransactionStatus
{
    public function rules()
    {
        return [
            [['transact_id'], 'integer'],
            [['transact_state'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = TransactionStatus::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'transact_id' => $this->transact_id,
        ]);

        $query->andFilterWhere(['like', 'transact_state', $this->transact_state]);

        return $dataProvider;
    }
}
