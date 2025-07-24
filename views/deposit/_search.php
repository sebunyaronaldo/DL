<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\DepositSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="deposit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'deposit_id') ?>

    <?= $form->field($model, 'deposit_mm_number') ?>

    <?= $form->field($model, 'deposit_refer') ?>

    <?= $form->field($model, 'deposit_email') ?>

    <?= $form->field($model, 'depositor_name') ?>

    <?php // echo $form->field($model, 'depositor_userid') ?>

    <?php // echo $form->field($model, 'deposit_amount') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
