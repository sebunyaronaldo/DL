<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\TransactionStatus $model
 */

$this->title = $model->transact_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Transaction Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-status-view">
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
            'transact_id',
            'transact_state',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->transact_id],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
