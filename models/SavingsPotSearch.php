<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SavingsPot;

/**
 * SavingsPotSearch represents the model behind the search form about `app\models\SavingsPot`.
 */
class SavingsPotSearch extends SavingsPot
{
    public function rules()
    {
        return [
            [['savings_pot_id', 'savings_pot_taker_curr', 'savings_pot_prev', 'savings_pot_amount'], 'integer'],
            [['claimed_status'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = SavingsPot::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'savings_pot_id' => $this->savings_pot_id,
            'savings_pot_taker_curr' => $this->savings_pot_taker_curr,
            'savings_pot_prev' => $this->savings_pot_prev,
            'savings_pot_amount' => $this->savings_pot_amount,
        ]);

        $query->andFilterWhere(['like', 'claimed_status', $this->claimed_status]);

        return $dataProvider;
    }
}
