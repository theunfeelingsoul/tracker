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
?>
<h1>report/collections</h1>

<p>
    This report allows you to find loans between certain dates.
</p>

<?= Html::beginForm(['report/collections', 'id'=>''], 'post', ['enctype' => 'multipart/form-data','class'=>'form-inline']) ?>
	<h1>Date Range</h1>
	<div class="form-group">
		<!-- <label for="exampleInputName2">Name</label> -->
		<!-- <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe"> -->
		<!-- </?= Html::input('text', 'username', '', ['class' => 'form-control']) ?> -->
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
		<label for="exampleInputEmail2">To:</label>
		<!-- <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com"> -->
		<!-- </?= Html::input('text', 'username', '', ['class' => 'form-control'])?> -->

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

	<button type="submit" class="btn btn-default">Search</button>


<?= Html::endForm() ?>

<!-- <form class="form-inline">
  <div class="form-group">
    <label for="exampleInputName2">Name</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail2">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
  </div>
  <button type="submit" class="btn btn-default">Send invitation</button>
</form> -->

<hr>
<?php if (isset($dataProvider)): ?>
  

<?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    'loan_ref',
                    // 'supplier',
                    array(
                        'attribute' => 'supplier',
                        'format' => 'html',
                        'value' => function ($data) {
                            $user = new Suppliers();
                            $user_stuff = $user->findOne($data['supplier']);
                            return $user_stuff['supplier'];
                        },

                    ),
                    'product',
                    array(
                        'attribute' => 'product',
                        'format' => 'html',
                        'value' => function ($data) {
                            $model = new Products();
                            $product = $model->findOne($data['product']);
                            return $product['product'];
                        },

                    ),
                    // 'bank',
                    array(
                        'attribute' => 'bank',
                        'format' => 'html',
                        'value' => function ($data) {
                            $model = new Banklist();
                            $bank = $model->findOne($data['bank']);
                            return $bank['bank'];
                        },

                    ),
                    'lc_terms',
                    // 'pif_terms',
                    // 'bl_date',
                    // 'start_date',
                    'end_date',
                    // 'currency',
                    array(
                        'attribute' => 'currency',
                        'format' => 'html',
                        'value' => function ($data) {
                            $model = new Currency();
                            $cur = $model->findOne($data['currency']);
                            return $cur['cur'];
                        },

                    ),
                    'amount',
                    // 'int_rate',
                    array(
                        'attribute' => 'int_rate',
                        'format' => 'html',
                        'value' => function ($data) {
                            
                            return $data['int_rate'].'%';
                        },

                    ),
                    'int_to_be_paid',
                    'payment',
                    // 'paid_status',
                    array(
                        'attribute' => 'paid_status',
                        'format' => 'html',
                        'value' => function ($data) {
                            if ($data['paid_status'] == 'Paid') {
                                # code...
                            return $data['paid_status'].'     '.'<span class="glyphicon glyphicon-ok"></span>';
                            }else{
                            return $data['paid_status'].'     '.'<span class="glyphicon glyphicon-remove"></span>';

                            }
                        },

                    ),


                    // ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
<?php endif ?>