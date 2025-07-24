<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\MoneyPoolSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="money-pool-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mpool_id') ?>

    <?= $form->field($model, 'group_id') ?>

    <?= $form->field($model, 'set_mpool_goal') ?>

    <?= $form->field($model, 'mpool_url') ?>

    <?= $form->field($model, 'mpool_qr_code') ?>

    <?php // echo $form->field($model, 'mpool_creator_id') ?>

    <?php // echo $form->field($model, 'duration') ?>

    <?php // echo $form->field($model, 'mpool_motivation') ?>

    <?php // echo $form->field($model, 'mpool_title') ?>

    <?php // echo $form->field($model, 'mpool_end_date') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
