<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\WithdrawRule $model
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Withdraw Rule',
]) . ' ' . $model->withdraw_rule_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Withdraw Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->withdraw_rule_id, 'url' => ['view', 'id' => $model->withdraw_rule_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="withdraw-rule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
