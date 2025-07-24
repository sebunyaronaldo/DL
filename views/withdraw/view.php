<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Withdraw $model
 */

$this->title = $model->withdraw_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Withdraws'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="withdraw-view">
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
            'withdraw_id',
            'withdraw_number',
            'withdraw_name',
            'withdraw_amount',
            'withdraw_date',
            'withdraw_userid',
            'withdraw_status',
            'user_id',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->withdraw_id],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
