<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TesKesehatan */

$this->title = $model->id_tes_kesehatan;
$this->params['breadcrumbs'][] = ['label' => 'Tes Kesehatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tes-kesehatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_tes_kesehatan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_tes_kesehatan], [
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
            'id_tes_kesehatan',
            'nilai_tes_kesehatan',
            'id_apply_lowongan',
        ],
    ]) ?>

</div>
