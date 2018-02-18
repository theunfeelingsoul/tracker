<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Systemusers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="systemusers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true,'placeholder' => "Full Name"])->label(false) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true,'placeholder' => "Username"])->label(false) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'placeholder' => "Password"])->label(false) ?>

    <!-- </?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeholder' => "Email"])->label(false) ?>

    <!-- </?= $form->field($model, 'hash')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton('Register', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
