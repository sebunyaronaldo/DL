<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Group;

/**
 * GroupSearch represents the model behind the search form about `app\models\Group`.
 */
class GroupSearch extends Group
{
    public function rules()
    {
        return [
            [['group_id'], 'integer'],
            [['group_name', 'group_limit', 'group_total', 'group_lead', 'group_image'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Group::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'group_id' => $this->group_id,
        ]);

        $query->andFilterWhere(['like', 'group_name', $this->group_name])
            ->andFilterWhere(['like', 'group_limit', $this->group_limit])
            ->andFilterWhere(['like', 'group_total', $this->group_total])
            ->andFilterWhere(['like', 'group_lead', $this->group_lead])
            ->andFilterWhere(['like', 'group_image', $this->group_image]);

        return $dataProvider;
    }
}
