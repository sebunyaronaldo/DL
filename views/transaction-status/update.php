<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\TransactionStatus $model
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Transaction Status',
]) . ' ' . $model->transact_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Transaction Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->transact_id, 'url' => ['view', 'id' => $model->transact_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="transaction-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
