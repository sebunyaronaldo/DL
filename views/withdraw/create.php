<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Withdraw $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Withdraw',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Withdraws'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="withdraw-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
