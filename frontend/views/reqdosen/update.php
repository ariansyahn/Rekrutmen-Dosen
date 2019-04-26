<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Reqdosen */

$this->title = 'Update Reqdosen: ' . $model->id_request;
$this->params['breadcrumbs'][] = ['label' => 'Reqdosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_request, 'url' => ['view', 'id' => $model->id_request]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reqdosen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
