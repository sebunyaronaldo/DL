<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\TransactionStatus $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Transaction Status',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Transaction Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-status-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
