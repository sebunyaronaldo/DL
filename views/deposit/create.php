<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Deposit $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Deposit',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Deposits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deposit-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
