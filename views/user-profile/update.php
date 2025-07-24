<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\UserProfile $model
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'User Profile',
]) . ' ' . $model->user_profile_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_profile_id, 'url' => ['view', 'id' => $model->user_profile_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-profile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
