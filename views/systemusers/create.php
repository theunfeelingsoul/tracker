<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Systemusers */

$this->title = 'Create an account';
// $this->params['breadcrumbs'][] = ['label' => 'Systemusers', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="systemusers-create">
	<div class="col-md-5 col-md-offset-3">

	    <h1><?= Html::encode($this->title) ?></h1>

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
