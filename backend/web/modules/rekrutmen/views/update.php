<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\rekrutmen\models\TReqdosen */

$this->title = 'Update Treqdosen: ' . $model->id_request;
$this->params['breadcrumbs'][] = ['label' => 'Treqdosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_request, 'url' => ['view', 'id' => $model->id_request]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="treqdosen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
