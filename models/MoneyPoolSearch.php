<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MoneyPool;

/**
 * MoneyPoolSearch represents the model behind the search form about `app\models\MoneyPool`.
 */
class MoneyPoolSearch extends MoneyPool
{
    public function rules()
    {
        return [
            [['mpool_id', 'group_id', 'mpool_url', 'mpool_creator_id', 'duration', 'mpool_end_date'], 'integer'],
            [['set_mpool_goal', 'mpool_qr_code', 'mpool_motivation', 'mpool_title'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = MoneyPool::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'mpool_id' => $this->mpool_id,
            'group_id' => $this->group_id,
            'mpool_url' => $this->mpool_url,
            'mpool_creator_id' => $this->mpool_creator_id,
            'duration' => $this->duration,
            'mpool_end_date' => $this->mpool_end_date,
        ]);

        $query->andFilterWhere(['like', 'set_mpool_goal', $this->set_mpool_goal])
            ->andFilterWhere(['like', 'mpool_qr_code', $this->mpool_qr_code])
            ->andFilterWhere(['like', 'mpool_motivation', $this->mpool_motivation])
            ->andFilterWhere(['like', 'mpool_title', $this->mpool_title]);

        return $dataProvider;
    }
}
