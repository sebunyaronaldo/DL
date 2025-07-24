<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\UserProfile $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'User Profile',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
