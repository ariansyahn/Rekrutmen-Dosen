<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Reqdosen */
$this->title = 'Buat Lowongan : ' . $model->id_matkul;
$this->params['breadcrumbs'][] = ['label' => 'Request Dosen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_matkul, 'url' => ['view', 'id' => $id]];
$this->params['breadcrumbs'][] = 'Buat Lowongan';
?>
<div class="reqdosen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
