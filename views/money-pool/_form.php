<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\MoneyPool $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="money-pool-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'group_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Group ID...']],

            'set_mpool_goal' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Set Mpool Goal...']],

            'mpool_url' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Mpool Url...']],

            'mpool_qr_code' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Mpool Qr Code...', 'maxlength' => 50]],

            'mpool_creator_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Mpool Creator ID...']],

            'duration' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Duration...']],

            'mpool_motivation' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Mpool Motivation...', 'maxlength' => 100]],

            'mpool_title' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Mpool Title...', 'maxlength' => 50]],

            'mpool_end_date' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Mpool End Date...']],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
