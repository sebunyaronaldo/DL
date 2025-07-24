<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\GroupMember $model
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Group Member',
]) . ' ' . $model->group_member_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Group Members'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->group_member_id, 'url' => ['view', 'id' => $model->group_member_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="group-member-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
