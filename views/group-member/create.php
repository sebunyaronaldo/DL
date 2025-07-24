<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\GroupMember $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Group Member',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Group Members'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-member-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
