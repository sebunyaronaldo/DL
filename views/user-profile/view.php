<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\UserProfile $model
 */

$this->title = $model->user_profile_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-view">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>


    <?= DetailView::widget([
        'model' => $model,
        'condensed' => false,
        'hover' => true,
        'mode' => Yii::$app->request->get('edit') == 't' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
        'panel' => [
            'heading' => $this->title,
            'type' => DetailView::TYPE_INFO,
        ],
        'attributes' => [
            'user_profile_id',
            'user_id',
            'fname',
            'lname',
            'mname',
            'mm_number',
            'mm_number_alt',
            'user_email:email',
            'location',
            'reminder',
            'group_frequency',
            'balance',
            'group_id',
            'mpool_id',
            'user_personal_invite',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->user_profile_id],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
