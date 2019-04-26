<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TesKesehatan */

$this->title = 'Update Tes Kesehatan: ' . $model->id_tes_kesehatan;
$this->params['breadcrumbs'][] = ['label' => 'Tes Kesehatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tes_kesehatan, 'url' => ['view', 'id' => $model->id_tes_kesehatan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tes-kesehatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
