<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TanggalTes */

$this->title = $model->id_tanggal_tes;
$this->params['breadcrumbs'][] = ['label' => 'Tanggal Tes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tanggal-tes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_tanggal_tes], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_tanggal_tes], [
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
            'id_tanggal_tes',
            'tanggal_microteaching',
            'tanggal_psikotes',
            'tanggal_kesehatan',
            'id_apply_lowongan',
        ],
    ]) ?>

</div>
