<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ApplyLowongan */

$this->title = 'Update Tanggal Tes Kesehatan';
$this->params['breadcrumbs'][] = ['label' => 'Apply Lowongan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apply-lowongan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formTanggalKesehatan', [
        'model' => $model,
        'currentDate' => $currentDate,
    ]) ?>

</div>
