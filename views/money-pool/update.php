<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\MoneyPool $model
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Money Pool',
]) . ' ' . $model->mpool_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Money Pools'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mpool_id, 'url' => ['view', 'id' => $model->mpool_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="money-pool-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
