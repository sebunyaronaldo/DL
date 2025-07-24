<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contribution_tracker".
 *
 * @property int $cont_track_id
 * @property float|null $amount
 * @property int|null $group_id
 * @property int|null $mpool_id
 * @property int|null $withdraw_id
 * @property int|null $deposit_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class ContributionTracker extends \yii\db\ActiveRecord
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
        return 'contribution_tracker';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'group_id', 'mpool_id', 'withdraw_id', 'deposit_id', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['amount'], 'number'],
            [['group_id', 'mpool_id', 'withdraw_id', 'deposit_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cont_track_id' => Yii::t('app', 'Cont Track ID'),
            'amount' => Yii::t('app', 'Amount'),
            'group_id' => Yii::t('app', 'Group'),
            'mpool_id' => Yii::t('app', 'Mpool'),
            'withdraw_id' => Yii::t('app', 'Withdraw ID'),
            'deposit_id' => Yii::t('app', 'Deposit ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

}
