<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "withdraws".
 *
 * @property int $withdraw_id
 * @property string|null $withdraw_number
 * @property string|null $withdraw_name
 * @property float|null $withdraw_amount
 * @property string|null $withdraw_date
 * @property int|null $withdraw_userid
 * @property int|null $withdraw_status
 * @property int|null $user_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Withdraw extends \yii\db\ActiveRecord
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
        return 'withdraws';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['withdraw_number', 'withdraw_name', 'withdraw_amount', 'withdraw_date', 'withdraw_userid', 'withdraw_status', 'user_id', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['withdraw_amount'], 'number'],
            [['withdraw_userid', 'withdraw_status', 'user_id'], 'integer'],
            [['withdraw_number', 'withdraw_name', 'withdraw_date'], 'string', 'max' => 50],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'withdraw_id' => Yii::t('app', 'Withdraw ID'),
            'withdraw_number' => Yii::t('app', 'Withdraw Number'),
            'withdraw_name' => Yii::t('app', 'Withdraw Name'),
            'withdraw_amount' => Yii::t('app', 'Withdraw Amount'),
            'withdraw_date' => Yii::t('app', 'Withdraw Date'),
            'withdraw_userid' => Yii::t('app', 'Withdraw Userid'),
            'withdraw_status' => Yii::t('app', 'Withdraw Status'),
            'user_id' => Yii::t('app', 'User ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

}
