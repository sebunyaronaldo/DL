<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\MoneyPool $model
 */

$this->title = $model->mpool_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Money Pools'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="money-pool-view">
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
            'mpool_id',
            'group_id',
            'set_mpool_goal',
            'mpool_url:url',
            'mpool_qr_code',
            'mpool_creator_id',
            'duration',
            'mpool_motivation',
            'mpool_title',
            'mpool_end_date',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->mpool_id],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
