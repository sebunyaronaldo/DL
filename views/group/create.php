<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Group $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Group',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
