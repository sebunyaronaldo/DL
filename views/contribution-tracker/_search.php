<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\ContributionTrackerSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="contribution-tracker-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cont_track_id') ?>

    <?= $form->field($model, 'amount') ?>

    <?= $form->field($model, 'group_id') ?>

    <?= $form->field($model, 'mpool_id') ?>

    <?= $form->field($model, 'withdraw_id') ?>

    <?php // echo $form->field($model, 'deposit_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
