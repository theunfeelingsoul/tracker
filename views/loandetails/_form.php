<?php

// use Yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use app\models\Banklist;
use app\models\Products;
use app\models\suppliers;
use app\models\currency;

/* @var $this yii\web\View */
/* @var $model app\models\Loandetails */
/* @var $form yii\widgets\ActiveForm */

$bankList       = ArrayHelper::map(Banklist::find()->all(), 'id', 'bank','int_rate');
$productList    = ArrayHelper::map(Products::find()->all(), 'id', 'product');
$supplierList   = ArrayHelper::map(Suppliers::find()->all(), 'id', 'supplier');
$currencyList   = ArrayHelper::map(Currency::find()->all(), 'id', 'cur');
?>

<div class="loandetails-form container-fluid">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        
            <div class="col-md-4">
                <?= $form->field($model, 'loan_ref')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-4">
                <!-- = $form->field($model, 'supplier')->textInput(['maxlength' => true]) ?> -->
                <?= $form->field($model, 'supplier')->dropdownList($supplierList,
                    ['prompt'=>'Choose a supplier']
                    ); 
                ?>
            </div>

            <div class="col-md-4">
                <!-- $form->field($model, 'product')->textInput(['maxlength' => true]) ?> -->
                <?= $form->field($model, 'product')->dropdownList($productList,
                        ['prompt'=>'Choose a product']
                    ); 
                ?>
            </div>
    </div>

    <div class="row">
        <div class="col-md-4">
             <!-- $form->field($model, 'bank')->textInput(['maxlength' => true]) ?> -->
            <?= $form->field($model, 'bank')->dropdownList($bankList,
                    ['prompt'=>'Choose a bank and Interest Rate']
                ); 
            ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'lc_terms')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'pif_terms')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <!-- $form->field($model, 'bl_date')->textInput(['maxlength' => true]) ?> -->
            <?= $form->field($model, 'bl_date')->widget(\yii\jui\DatePicker::classname(), [
                    //'language' => 'ru',
                    'dateFormat' => 'yyyy-MM-dd',
                    // 'from_date' => '2013-05-03',
                    'options' => ['class'=>'form-control datepicker'],
                    'clientOptions' => [
                    'changeMonth' => true,
                    // 'yearRange' => '2007:2050',
                    'changeYear' => true,
                    ],
                ]) ?>
        </div>

        <div class="col-md-4">
            <!-- $form->field($model, 'start_date')->textInput(['maxlength' => true]) ?> -->
            <?= $form->field($model, 'start_date')->widget(\yii\jui\DatePicker::classname(), [
                    //'language' => 'ru',
                    'dateFormat' => 'yyyy-MM-dd',
                    // 'from_date' => '2013-05-03',
                    'options' => ['class'=>'form-control datepicker'],
                    'clientOptions' => [
                    'changeMonth' => true,
                    // 'yearRange' => '2007:2050',
                    'changeYear' => true,
                    ],
                ]) ?>
        </div>


     
        <!-- <div class="col-md-4">
            </?= $form->field($model, 'end_date')->widget(\yii\jui\DatePicker::classname(), [
                //'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd',
                // 'from_date' => '2013-05-03',
                'options' => ['class'=>'form-control datepicker'],
                'clientOptions' => [
                'changeMonth' => true,
                // 'yearRange' => '2007:2050',
                'changeYear' => true,
                ],
            ]) ?>
        </div> -->
        <div class="col-md-4">
            <!-- $form->field($model, 'currency')->textInput(['maxlength' => true]) ?> -->
             <?= $form->field($model, 'currency')->dropdownList($currencyList,
                    ['prompt'=>'Choose a currency']
                    ); 
                ?>
        </div>
        
    </div>

    <div class="row">
        
        <div class="col-md-4">
            <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-4">
            <?php if ( Yii::$app->controller->action->id == 'update' ): ?>
               <?= $form->field($model, 'paid_status')->dropdownList(['Paid' => 'Paid', 'Not Paid' => 'Not Paid'], ['prompt' => 'Choose']) ?>
            <?php endif ?>
        </div>

        <!-- <div class="col-md-4">
            </?= $form->field($model, 'int_rate')->textInput(['maxlength' => true]) ?>
        </div> -->

        
    </div>
    <!-- <div class="row">
        <div class="col-md-4">
            </?= $form->field($model, 'int_to_be_paid')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-4">
            </?= $form->field($model, 'payment')->textInput(['maxlength' => true]) ?>
        </div>
    </div> -->
    </div>
    <div class="row">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
