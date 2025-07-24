<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ContributionTracker;

/**
 * ContributionTrackerSearch represents the model behind the search form about `app\models\ContributionTracker`.
 */
class ContributionTrackerSearch extends ContributionTracker
{
    public function rules()
    {
        return [
            [['cont_track_id', 'group_id', 'mpool_id', 'withdraw_id', 'deposit_id'], 'integer'],
            [['amount'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = ContributionTracker::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'cont_track_id' => $this->cont_track_id,
            'group_id' => $this->group_id,
            'mpool_id' => $this->mpool_id,
            'withdraw_id' => $this->withdraw_id,
            'deposit_id' => $this->deposit_id,
        ]);

        $query->andFilterWhere(['like', 'amount', $this->amount]);

        return $dataProvider;
    }
}
