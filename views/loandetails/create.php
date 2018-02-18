<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Loandetails */

$this->title = 'Create Loandetails';
$this->params['breadcrumbs'][] = ['label' => 'Loandetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loandetails-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
