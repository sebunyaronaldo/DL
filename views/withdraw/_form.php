<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Withdraw $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="withdraw-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'withdraw_number' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Withdraw Number...', 'maxlength' => 50]],

            'withdraw_name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Withdraw Name...', 'maxlength' => 50]],

            'withdraw_amount' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Withdraw Amount...']],

            'withdraw_date' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Withdraw Date...', 'maxlength' => 50]],

            'withdraw_userid' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Withdraw Userid...']],

            'withdraw_status' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Withdraw Status...']],

            'user_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter User ID...']],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
