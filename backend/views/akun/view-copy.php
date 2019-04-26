<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Akun */

$this->title = $model->email;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <h2>Data Akun</h2>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'email:email',
            'akunRoleRelation.userRole.nama_role',
            'created_at',
        ],
    ]) ?>

    <?= !$model->isAdmin ? '<h3>Data Pribadi</h3>' : ''?>

    <?php
    if($model->isPelamar) {
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                'dim.nim',
                'dim.nama',
                [
                    'attribute' => 'dim.jenisKelamin.name',
                    'label' => 'Jenis Kelamin'
                ],
                [
                    'attribute' => 'dim.ttl',
                    'label' => 'Tempat Tanggal Lahir'
                ],
                'dim.prodi.name',
                [
                    'attribute' => 'dim.thn_masuk',
                    'label' => 'Angkatan'
                ],
            ],
        ]);
    } elseif($model->isAlumni) {
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                'alumni.name',
                [
                    'attribute' => 'alumni.jenisKelamin.name',
                    'label' => 'Jenis Kelamin'
                ],
                [
                    'attribute' => 'alumni.ttl',
                    'label' => 'Tempat Tanggal Lahir'
                ],
                'alumni.prodi.name',
                'alumni.angkatan',
                'alumni.tahun_lulus',
            ],
        ]);
    }
    ?>

</div>
