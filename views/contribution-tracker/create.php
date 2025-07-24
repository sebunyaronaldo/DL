<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\ContributionTracker $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Contribution Tracker',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contribution Trackers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contribution-tracker-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
