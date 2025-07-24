<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SavingsPot $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Savings Pot',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Savings Pots'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="savings-pot-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
