<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\rekrutmen\models\TReqdosen */

$this->title = $model->id_request;
$this->params['breadcrumbs'][] = ['label' => 'Treqdosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treqdosen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_request], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_request], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_request',
            'matakuliah',
            'jumlah_dosen',
            'deskripsi_pekerjaan:ntext',
            'spesifikasi_dosen:ntext',
            'status_request',
            'id_koordinator',
        ],
    ]) ?>

</div>
