<?php 

use yii\grid\GridView;
use app\models\Suppliers;
use app\models\Products;
use app\models\Banklist;
use app\models\Currency;
use app\models\Loandetails;

 ?>

<div class="hidden-xs">
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
</div>

<div class="visible-xs">
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


          // ['class' => 'yii\grid\ActionColumn'],d
      ],
  ]); ?>
  </div>