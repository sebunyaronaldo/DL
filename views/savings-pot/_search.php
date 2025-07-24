<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\SavingsPotSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="savings-pot-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'savings_pot_id') ?>

    <?= $form->field($model, 'savings_pot_taker_curr') ?>

    <?= $form->field($model, 'savings_pot_prev') ?>

    <?= $form->field($model, 'savings_pot_amount') ?>

    <?= $form->field($model, 'claimed_status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
