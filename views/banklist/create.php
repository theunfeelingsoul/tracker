<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Banklist */

$this->title = 'Create Banklist';
$this->params['breadcrumbs'][] = ['label' => 'Banklists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banklist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
