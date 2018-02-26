<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Suppliers;
use app\models\Products;
use app\models\Banklist;
use app\models\Currency;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LoandetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loan details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loandetails-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create a Loan', ['create'], ['class' => 'btn btn-success']) ?>
        <!-- </?= Html::a('Show Paid Loans', ['index','maturity'=>'Paid'], ['class' => 'btn btn-success']) ?> -->
        <!-- </?= Html::a('Show Not Paid Loans', ['index','maturity'=>'Not Paid'], ['class' => 'btn btn-success']) ?> -->
    </p>
    <div class="hidden-xs">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
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


                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
    </div>

    <div class="visible-xs">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
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
                    // 'product',
                    // array(
                    //     'attribute' => 'product',
                    //     'format' => 'html',
                    //     'value' => function ($data) {
                    //         $model = new Products();
                    //         $product = $model->findOne($data['product']);
                    //         return $product['product'];
                    //     },

                    // ),
                    // // 'bank',
                    // array(
                    //     'attribute' => 'bank',
                    //     'format' => 'html',
                    //     'value' => function ($data) {
                    //         $model = new Banklist();
                    //         $bank = $model->findOne($data['bank']);
                    //         return $bank['bank'];
                    //     },

                    // ),
                    // 'lc_terms',
                    // // 'pif_terms',
                    // // 'bl_date',
                    // // 'start_date',
                    // 'end_date',
                    // // 'currency',
                    // array(
                    //     'attribute' => 'currency',
                    //     'format' => 'html',
                    //     'value' => function ($data) {
                    //         $model = new Currency();
                    //         $cur = $model->findOne($data['currency']);
                    //         return $cur['cur'];
                    //     },

                    // ),
                    // 'amount',
                    // // 'int_rate',
                    // array(
                    //     'attribute' => 'int_rate',
                    //     'format' => 'html',
                    //     'value' => function ($data) {
                            
                    //         return $data['int_rate'].'%';
                    //     },

                    // ),
                    // 'int_to_be_paid',
                    // 'payment',
                    // // 'paid_status',
                    // array(
                    //     'attribute' => 'paid_status',
                    //     'format' => 'html',
                    //     'value' => function ($data) {
                    //         if ($data['paid_status'] == 'Paid') {
                    //             # code...
                    //         return $data['paid_status'].'     '.'<span class="glyphicon glyphicon-ok"></span>';
                    //         }else{
                    //         return $data['paid_status'].'     '.'<span class="glyphicon glyphicon-remove"></span>';

                    //         }
                    //     },

                    // ),


                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
    </div>
</div>
