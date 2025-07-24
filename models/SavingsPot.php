<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "savings_pot".
 *
 * @property int $savings_pot_id
 * @property int|null $savings_pot_taker_curr
 * @property int|null $savings_pot_prev
 * @property int|null $savings_pot_amount
 * @property int|null $claimed_status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class SavingsPot extends \yii\db\ActiveRecord
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
        return 'savings_pot';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['savings_pot_taker_curr', 'savings_pot_prev', 'savings_pot_amount', 'claimed_status', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['savings_pot_taker_curr', 'savings_pot_prev', 'savings_pot_amount', 'claimed_status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'savings_pot_id' => Yii::t('app', 'Savings Pot ID'),
            'savings_pot_taker_curr' => Yii::t('app', 'Current'),
            'savings_pot_prev' => Yii::t('app', 'Previous'),
            'savings_pot_amount' => Yii::t('app', 'Amount'),
            'claimed_status' => Yii::t('app', 'Credited'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

}
