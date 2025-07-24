<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Deposit $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="deposit-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'deposit_mm_number' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Deposit Mm Number...']],

            'deposit_refer' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Deposit Refer...', 'maxlength' => 50]],

            'deposit_email' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Deposit Email...', 'maxlength' => 50]],

            'depositor_name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Depositor Name...', 'maxlength' => 50]],

            'depositor_userid' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Depositor Userid...']],

            'deposit_amount' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Deposit Amount...']],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
