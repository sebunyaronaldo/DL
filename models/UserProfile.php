<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property int $user_profile_id
 * @property int|null $user_id
 * @property string|null $fname
 * @property string|null $lname
 * @property string|null $mname
 * @property string|null $mm_number
 * @property string|null $mm_number_alt
 * @property string|null $user_email
 * @property string|null $location
 * @property int|null $reminder
 * @property int|null $group_frequency
 * @property float|null $balance
 * @property int|null $group_id
 * @property int|null $mpool_id
 * @property string|null $user_personal_invite
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class UserProfile extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_profile';
    }

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
    public function rules()
    {
        return [
            [['user_id', 'fname', 'lname', 'mname', 'mm_number', 'mm_number_alt', 'user_email', 'location', 'reminder', 'group_frequency', 'balance', 'group_id', 'mpool_id', 'user_personal_invite', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['user_id', 'reminder', 'group_frequency', 'group_id', 'mpool_id'], 'integer'],
            [['balance'], 'number'],
            [['fname', 'lname', 'mname', 'mm_number', 'mm_number_alt', 'user_personal_invite'], 'string', 'max' => 50],
            [['user_email'], 'string', 'max' => 150],
            [['location'], 'string', 'max' => 100],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_profile_id' => Yii::t('app', 'User Profile ID'),
            'user_id' => Yii::t('app', 'UserID'),
            'fname' => Yii::t('app', 'First'),
            'lname' => Yii::t('app', 'Last'),
            'mname' => Yii::t('app', 'Middle'),
            'mm_number' => Yii::t('app', 'Phone'),
            'mm_number_alt' => Yii::t('app', '2nd Line'),
            'user_email' => Yii::t('app', 'Email'),
            'location' => Yii::t('app', 'Address'),
            'reminder' => Yii::t('app', 'Reminder'),
            'group_frequency' => Yii::t('app', 'Group Frequency'),
            'balance' => Yii::t('app', 'Balance'),
            'group_id' => Yii::t('app', 'Group'),
            'mpool_id' => Yii::t('app', 'Money pool'),
            'user_personal_invite' => Yii::t('app', 'Invite'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

}
