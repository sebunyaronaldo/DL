<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\WithdrawRule $model
 */

$this->title = $model->withdraw_rule_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Withdraw Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="withdraw-rule-view">
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
            'withdraw_rule_id',
            'withdraw_rule',
            'withdraw_condition',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->withdraw_rule_id],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
