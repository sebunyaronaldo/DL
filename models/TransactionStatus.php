<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaction_status".
 *
 * @property int $transact_id
 * @property string|null $transact_state
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class TransactionStatus extends \yii\db\ActiveRecord
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
        return 'transaction_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transact_state', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['transact_state'], 'string', 'max' => 50],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'transact_id' => Yii::t('app', 'Transact ID'),
            'transact_state' => Yii::t('app', 'Transact State'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

}
