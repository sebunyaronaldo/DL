<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Deposit $model
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Deposit',
]) . ' ' . $model->deposit_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Deposits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->deposit_id, 'url' => ['view', 'id' => $model->deposit_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="deposit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
