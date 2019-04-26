<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use backend\assets\AdminLteAsset;

/* @var $this yii\web\View */
/* @var $model backend\models\Reqdosen */
AdminLteAsset::register($this);
$this->title = $model->idMatkul->nama_matkul;
$this->params['breadcrumbs'][] = ['label' => 'Request Dosen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">

<br/>
<div class="container-fluid">
    <div class="header-container">

        <div class="row">
            <div class="col-md-12">
                <h2>
                    <?= Html::encode($model->idMatkul->nama_matkul)?>
                </h2>
                <p>
                <?= Yii::$app->user->identity->isAdminHRD ? Html::a('Buat Lowongan', ['buat-lowongan', 'id' => $model->id_request], ['class' => 'btn btn-primary']): ''?>
    <?= Yii::$app->user->identity->isAdminKoordinatorUnit ? Html::a('Delete', ['request-dosen-delete', 'id' => $model->id_request], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) :'' ?>
                </p>
            </div>

        </div>
    </div>
</div>
<br/>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="panel box box-primary" style="min-height:290px ;max-height: 290px; overflow-y: scroll;">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">
                        <h4><strong>Info</strong></h4>
                        <hr>
                        <h4>Mata Kuliah</h4>
                        <h4><strong><span class="label label-info"><?= Html::encode($model->idMatkul->nama_matkul)?></span></strong></h4>
                        <hr/>
                        <h4>Jumlah Dosen</h4>
                        <h4><strong><span class="label label-info"><?= Html::encode($model->jumlah_dosen)?></span></strong></h4>
                        <hr>
                        <h4>Status</h4>
                        <h4><strong><span class="label label-info"><?= Html::encode($model->idLowonganStatus->status)?></span></strong></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel box box-primary" style="min-height:500px ;max-height: 500px; overflow-y: scroll;">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">
                        <h4><strong>Deskripsi Pekerjaan</strong>
                        </h4>
                        <div class="col-md-12">
                            <hr/>
                        </div>
                        <?= Html::decode($model->deskripsi_pekerjaan) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel box box-primary" style="min-height:500px ;max-height: 500px; overflow-y: scroll;">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">
                        <h4><strong>Spesifikasi Dosen</strong></h4>
                        <hr/>
                        <?= Html::decode($model->spesifikasi_dosen) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<div class="reqdosen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?= Yii::$app->user->identity->isAdminHRD ? Html::a('Buat Lowongan', ['buat-lowongan', 'id' => $model->id_request], ['class' => 'btn btn-primary']): ''?>
    <?= Yii::$app->user->identity->isAdminKoordinatorUnit ? Html::a('Delete', ['request-dosen-delete', 'id' => $model->id_request], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) :'' ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id_request',
            'idMatkul.nama_matkul',
            'idLowonganStatus.status',
            'jumlah_dosen',
            'deskripsi_pekerjaan:ntext',
            'spesifikasi_dosen:ntext',
        ],
    ]) ?>

</div>
