<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Group $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="group-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'group_name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Group Name...', 'maxlength' => 50]],

            'group_limit' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Group Limit...']],

            'group_total' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Group Total...']],

            'group_lead' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Group Lead...', 'maxlength' => 50]],

            'group_image' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Group Image...', 'maxlength' => 500]],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
