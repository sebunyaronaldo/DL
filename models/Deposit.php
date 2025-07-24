<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "deposits".
 *
 * @property int $deposit_id
 * @property int|null $deposit_mm_number
 * @property string|null $deposit_refer
 * @property string|null $deposit_email
 * @property string|null $depositor_name
 * @property int|null $depositor_userid
 * @property float|null $deposit_amount
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Deposit extends \yii\db\ActiveRecord
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
        return 'deposits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['deposit_mm_number', 'deposit_refer', 'deposit_email', 'depositor_name', 'depositor_userid', 'deposit_amount', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['deposit_mm_number', 'depositor_userid'], 'integer'],
            [['deposit_amount'], 'number'],
            [['deposit_refer', 'deposit_email', 'depositor_name'], 'string', 'max' => 50],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'deposit_id' => Yii::t('app', 'Deposit ID'),
            'deposit_mm_number' => Yii::t('app', 'Deposit Mm Number'),
            'deposit_refer' => Yii::t('app', 'Deposit Refer'),
            'deposit_email' => Yii::t('app', 'Deposit Email'),
            'depositor_name' => Yii::t('app', 'Depositor Name'),
            'depositor_userid' => Yii::t('app', 'Depositor Userid'),
            'deposit_amount' => Yii::t('app', 'Deposit Amount'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

}
