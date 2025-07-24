<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\ContributionTracker $model
 */

$this->title = $model->cont_track_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contribution Trackers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contribution-tracker-view">
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
            'cont_track_id',
            'amount',
            'group_id',
            'mpool_id',
            'withdraw_id',
            'deposit_id',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->cont_track_id],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
