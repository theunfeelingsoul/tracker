<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BanklistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banklists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banklist-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Banklist', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'bank',
            'int_rate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
