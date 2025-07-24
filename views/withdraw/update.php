<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Withdraw $model
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Withdraw',
]) . ' ' . $model->withdraw_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Withdraws'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->withdraw_id, 'url' => ['view', 'id' => $model->withdraw_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="withdraw-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
