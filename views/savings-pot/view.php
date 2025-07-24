<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\SavingsPot $model
 */

$this->title = $model->savings_pot_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Savings Pots'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="savings-pot-view">
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
            'savings_pot_id',
            'savings_pot_taker_curr',
            'savings_pot_prev',
            'savings_pot_amount',
            'claimed_status',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->savings_pot_id],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
