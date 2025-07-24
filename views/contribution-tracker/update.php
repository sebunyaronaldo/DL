<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\ContributionTracker $model
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Contribution Tracker',
]) . ' ' . $model->cont_track_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contribution Trackers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cont_track_id, 'url' => ['view', 'id' => $model->cont_track_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="contribution-tracker-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
