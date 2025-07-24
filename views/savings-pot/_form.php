<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\SavingsPot $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="savings-pot-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'savings_pot_taker_curr' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Savings Pot Taker Curr...']],

            'savings_pot_prev' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Savings Pot Prev...']],

            'savings_pot_amount' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Savings Pot Amount...']],

            'claimed_status' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Claimed Status...']],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
