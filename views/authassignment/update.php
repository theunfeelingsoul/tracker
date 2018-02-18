<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Authassignment */

$this->title = 'Update Authassignment: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Authassignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->item_name, 'url' => ['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="authassignment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
