<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group_members".
 *
 * @property int $group_member_id
 * @property int|null $user_id
 * @property int|null $group_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class GroupMember extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => function() { return date('Y-m-d H:i:s'); },
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_members';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'user_id', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['group_id', 'user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'group_member_id' => Yii::t('app', 'Group Member ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'group_id' => Yii::t('app', 'Group ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

}
