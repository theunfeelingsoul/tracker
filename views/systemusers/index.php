<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SystemusersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Systemusers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="systemusers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Systemusers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'full_name',
            'username',
            'password',
            'auth_key',
            //'email:email',
            //'hash',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
