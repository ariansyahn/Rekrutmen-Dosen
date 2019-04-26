<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ApplyLowonganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Lamaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apply-lowongan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_apply_lowongan',
            'idPelamar.nama_lengkap',
            'idApplyLowonganStatus.status',
            'idReqdosen.idMatkul.nama_matkul',
            // 'ktp',
            // 'cv',
            // 'ijazah',
            // 'kartu_keluarga',
            // 'skck',
            // 'transkrip_nilai',
            // 'keterangan_pengalaman_kerja',
            // [
            //     'header' => 'CV',
            //     'format' => 'raw',
            //     'value' => function($model) {
            //         return $model->cv != null ? Html::a('Download', '../web/uploads/berkas_pelamar/' . $model->cv) : '-';
            //     }
            // ],
            [
                'format' => 'raw',
                'value' => function($model, $key, $index, $column) {
                    return Html::a('Lihat', ['view', 'id' => $model->id_apply_lowongan], ['class' => 'btn btn-primary']);
                }
            ],
        ],
    ]); ?>
</div>
