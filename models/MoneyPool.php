<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "money_pool".
 *
 * @property int $mpool_id
 * @property int|null $group_id
 * @property float|null $set_mpool_goal
 * @property int|null $mpool_url
 * @property string|null $mpool_qr_code
 * @property int|null $mpool_creator_id
 * @property int|null $duration
 * @property string|null $mpool_motivation movies,party,travel
 * @property string|null $mpool_title
 * @property int|null $mpool_end_date
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class MoneyPool extends \yii\db\ActiveRecord
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
        return 'money_pool';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'set_mpool_goal', 'mpool_url', 'mpool_qr_code', 'mpool_creator_id', 'duration', 'mpool_motivation', 'mpool_title', 'mpool_end_date', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['group_id', 'mpool_url', 'mpool_creator_id', 'duration', 'mpool_end_date'], 'integer'],
            [['set_mpool_goal'], 'number'],
            [['mpool_qr_code', 'mpool_title'], 'string', 'max' => 50],
            [['mpool_motivation'], 'string', 'max' => 100],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mpool_id' => Yii::t('app', 'Mpool ID'),
            'group_id' => Yii::t('app', 'Group'),
            'set_mpool_goal' => Yii::t('app', 'Amount Goal'),
            'mpool_url' => Yii::t('app', 'Link'),
            'mpool_qr_code' => Yii::t('app', 'ShareCode'),
            'mpool_creator_id' => Yii::t('app', 'Creator'),
            'duration' => Yii::t('app', 'Duration'),
            'mpool_motivation' => Yii::t('app', 'Reason'),
            'mpool_title' => Yii::t('app', 'Title'),
            'mpool_end_date' => Yii::t('app', 'End Date'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

}
