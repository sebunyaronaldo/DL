<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "groups".
 *
 * @property int $group_id
 * @property string|null $group_name
 * @property float|null $group_limit
 * @property float|null $group_total
 * @property string|null $group_lead
 * @property string|null $group_image
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Group extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * {@inheritdoc}
     */
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
            [['group_name', 'group_limit', 'group_total', 'group_lead', 'group_image', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['group_limit', 'group_total'], 'number'],
            [['group_name', 'group_lead'], 'string', 'max' => 50],
            [['group_image'], 'string', 'max' => 500],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'group_id' => Yii::t('app', 'Group ID'),
            'group_name' => Yii::t('app', 'Group Name'),
            'group_limit' => Yii::t('app', 'Group Limit'),
            'group_total' => Yii::t('app', 'Group Total'),
            'group_lead' => Yii::t('app', 'Group Lead'),
            'group_image' => Yii::t('app', 'Group Image'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

}
