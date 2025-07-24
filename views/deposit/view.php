<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Deposit $model
 */

$this->title = $model->deposit_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Deposits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deposit-view">
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
            'deposit_id',
            'deposit_mm_number',
            'deposit_refer',
            'deposit_email:email',
            'depositor_name',
            'depositor_userid',
            'deposit_amount',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->deposit_id],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
