<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\WithdrawRule $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="withdraw-rule-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'withdraw_rule' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Withdraw Rule...', 'maxlength' => 50]],

            'withdraw_condition' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Withdraw Condition...', 'maxlength' => 50]],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
