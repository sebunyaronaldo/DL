<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\ContributionTracker $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="contribution-tracker-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'amount' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Amount...']],

            'group_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Group ID...']],

            'mpool_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Mpool ID...']],

            'withdraw_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Withdraw ID...']],

            'deposit_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Deposit ID...']],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
