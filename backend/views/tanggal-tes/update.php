<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TanggalTes */

$this->title = 'Update Tanggal Tes: ' . $model->id_tanggal_tes;
$this->params['breadcrumbs'][] = ['label' => 'Tanggal Tes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tanggal_tes, 'url' => ['view', 'id' => $model->id_tanggal_tes]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tanggal-tes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
