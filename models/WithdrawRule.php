<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "withdraw_rules".
 *
 * @property int $withdraw_rule_id
 * @property string|null $withdraw_rule
 * @property string|null $withdraw_condition
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class WithdrawRule extends \yii\db\ActiveRecord
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
        return 'withdraw_rules';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rule_name', 'rule_value', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['rule_name'], 'string', 'max' => 100],
            [['rule_value'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'withdraw_rule_id' => Yii::t('app', 'Withdraw Rule ID'),
            'withdraw_rule' => Yii::t('app', 'Withdraw Rule'),
            'withdraw_condition' => Yii::t('app', 'Withdraw Condition'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

}
