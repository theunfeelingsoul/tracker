<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Loandetails */

$this->title = "Update Loandetails: {$model->loan_ref}";
$this->params['breadcrumbs'][] = ['label' => 'Loandetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="loandetails-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
