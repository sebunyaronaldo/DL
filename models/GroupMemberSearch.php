<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GroupMember;

/**
 * GroupMemberSearch represents the model behind the search form about `app\models\GroupMember`.
 */
class GroupMemberSearch extends GroupMember
{
    public function rules()
    {
        return [
            [['group_member_id', 'user_id', 'group_id'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = GroupMember::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'group_member_id' => $this->group_member_id,
            'user_id' => $this->user_id,
            'group_id' => $this->group_id,
        ]);

        return $dataProvider;
    }
}
