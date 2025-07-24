<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SavingsPot $model
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Savings Pot',
]) . ' ' . $model->savings_pot_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Savings Pots'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->savings_pot_id, 'url' => ['view', 'id' => $model->savings_pot_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="savings-pot-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
