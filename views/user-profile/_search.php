<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\UserProfileSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="user-profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_profile_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'fname') ?>

    <?= $form->field($model, 'lname') ?>

    <?= $form->field($model, 'mname') ?>

    <?php // echo $form->field($model, 'mm_number') ?>

    <?php // echo $form->field($model, 'mm_number_alt') ?>

    <?php // echo $form->field($model, 'user_email') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'reminder') ?>

    <?php // echo $form->field($model, 'group_frequency') ?>

    <?php // echo $form->field($model, 'balance') ?>

    <?php // echo $form->field($model, 'group_id') ?>

    <?php // echo $form->field($model, 'mpool_id') ?>

    <?php // echo $form->field($model, 'user_personal_invite') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
