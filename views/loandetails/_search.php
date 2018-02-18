<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoandetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loandetails-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'loan_ref') ?>

    <?= $form->field($model, 'supplier') ?>

    <?= $form->field($model, 'product') ?>

    <?= $form->field($model, 'bank') ?>

    <?php // echo $form->field($model, 'lc_terms') ?>

    <?php // echo $form->field($model, 'pif_terms') ?>

    <?php // echo $form->field($model, 'bl_date') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'currency') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'int_rate') ?>

    <?php // echo $form->field($model, 'int_to_be_paid') ?>

    <?php // echo $form->field($model, 'payment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
