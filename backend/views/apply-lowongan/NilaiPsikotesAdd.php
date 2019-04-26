<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ApplyLowongan */

$this->title = 'Masukkan Nilai Psikotes';
$this->params['breadcrumbs'][] = ['label' => 'Apply Lowongan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apply-lowongan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formNilaiPsikotes', [
        'model' => $model,
    ]) ?>

</div>
