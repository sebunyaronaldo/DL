<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\UserProfile $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="user-profile-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            //'user_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter User ID...']],

            'fname' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter First Name...', 'maxlength' => 50]],

            'lname' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Last Name...', 'maxlength' => 50]],

            'mname' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Middle Name...', 'maxlength' => 50]],

            'mm_number' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Phone Number...', 'maxlength' => 50]],

            'mm_number_alt' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Mm Number Alt...', 'maxlength' => 50]],

            'user_email' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Email...', 'maxlength' => 150]],

            'location' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Address...', 'maxlength' => 100]],

            'reminder' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Set Reminder...']],

            'group_frequency' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Group Frequency...']],

            'balance' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'See Balance...']],

            'group_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Choose Group...']],

            'mpool_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Choose Mpool...']],

           // 'user_personal_invite' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter User Personal Invite...', 'maxlength' => 50]],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
