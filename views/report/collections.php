<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\grid\GridView;
use app\models\Suppliers;
use app\models\Products;
use app\models\Banklist;
use app\models\Currency;
use app\models\Loandetails;
use app\models\LoandetailsSearch;
use yii\helpers\ArrayHelper;


$loanOptions = array('paid'=>'Paid Loans','Not Paid'=>'Un Paid Loans' );
$SupplierList = ArrayHelper::map(Suppliers::find()->all(), 'id', 'supplier');
$bankList       = ArrayHelper::map(Banklist::find()->all(), 'id', 'bank');

?>
<h1>report/collections</h1>

<p>
    This report allows you to find loans between certain dates.
</p>

<?= Html::beginForm(['report/collections', 'id'=>''], 'post', ['enctype' => 'multipart/form-data','class'=>'form-inline']) ?>
	<h1>Filter loans</h1>
	<div class="form-group">
    <!-- Date picker makes a text input -->
    <?php echo DatePicker::widget([
      'name'  => 'from_date',
      'value'  => '',
      'dateFormat' => 'yyyy-MM-dd',
      // 'class'  => 'form-control',
      'options' => ['class'=>'form-control'],
      //'language' => 'ru',
      //'dateFormat' => 'yyyy-MM-dd',
    ]); ?>
	</div>
	<div class="form-group">
    <label>To:</label>

    <?php echo DatePicker::widget([
      'name'  => 'to_date',
      'value'  => '',
      'dateFormat' => 'yyyy-MM-dd',
      // 'class'  => 'form-control',
      'options' => ['class'=>'form-control'],
      //'language' => 'ru',
      //'dateFormat' => 'yyyy-MM-dd',
    ]); ?>
  </div>
  <span class="pole"></span>
    <div class="form-group">
      <?= Html::dropDownList('loan', 'd', $loanOptions, ['prompt' => 'Loan Status (optional)','class'=>'form-control']) ?>
    </div>
    <div class="form-group">
      <?= Html::dropDownList('supplier', 'd', $SupplierList, ['prompt' => 'Supplier List (optional)','class'=>'form-control']) ?>
    </div>
    <div class="form-group">
      <?= Html::dropDownList('bank', 'd', $bankList, ['prompt' => 'Bank List (optional)','class'=>'form-control']) ?>
    </div>


	<button type="submit" class="btn btn-default">Search</button>

<?= Html::endForm() ?>



<hr>

<!-- Only show the following if $dataProvider is present -->
<?php if (isset($dataProvider)): ?>
  

   <?= $this->render('loan_gridview', [
         'dataProvider' => $dataProvider,
    ]) ?>
<?php endif ?>