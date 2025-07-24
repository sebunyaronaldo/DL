<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserProfile;

/**
 * UserProfileSearch represents the model behind the search form about `app\models\UserProfile`.
 */
class UserProfileSearch extends UserProfile
{
    public function rules()
    {
        return [
            [['user_profile_id', 'user_id', 'reminder', 'group_frequency', 'group_id', 'mpool_id'], 'integer'],
            [['fname', 'lname', 'mname', 'mm_number', 'mm_number_alt', 'user_email', 'location', 'balance', 'user_personal_invite'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = UserProfile::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'user_profile_id' => $this->user_profile_id,
            'user_id' => $this->user_id,
            'reminder' => $this->reminder,
            'group_frequency' => $this->group_frequency,
            'group_id' => $this->group_id,
            'mpool_id' => $this->mpool_id,
        ]);

        $query->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'mname', $this->mname])
            ->andFilterWhere(['like', 'mm_number', $this->mm_number])
            ->andFilterWhere(['like', 'mm_number_alt', $this->mm_number_alt])
            ->andFilterWhere(['like', 'user_email', $this->user_email])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'balance', $this->balance])
            ->andFilterWhere(['like', 'user_personal_invite', $this->user_personal_invite]);

        return $dataProvider;
    }
}
