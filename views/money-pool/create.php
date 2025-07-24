<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\MoneyPool $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Money Pool',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Money Pools'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="money-pool-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
