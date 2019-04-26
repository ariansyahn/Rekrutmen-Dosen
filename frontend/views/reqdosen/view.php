<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use backend\models\ApplyLowonganStatus;

/* @var $this yii\web\View */
/* @var $model backend\models\Reqdosen */

$this->title = $model->idMatkul->nama_matkul;
$this->params['breadcrumbs'][] = ['label' => 'Lowongan Pekerjaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="header-container">

        <div class="row">
            <div class="col-md-8">
                <h2>
                    <?= Html::encode($model->idMatkul->nama_matkul)?>
                </h2>
            </div>
            <div class="col-md-4" align="right">
                <h2>
                    <small>
                      
                    </small>
                </h2>
            </div>
        </div>
    </div>
</div>
<br/>

<div class="container">
    <div class="col-md-12">
        <div class="box box-gray">
            <div class="box-body" style="min-height:290px ;max-height: 290px; overflow-y: scroll;">
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
                        <?php 
                         if(!Yii::$app->user->isGuest){
                              if ($already_applied_here) { ?>
                        <h4>Status Lamaran</h4>
                        <?php
                                echo '<h4><strong><span class="label ';

                                if ($model->userApplyData->idApplyLowonganStatus->id_apply_lowongan_status == ApplyLowonganStatus::getApplyLowonganStatusId('Sedang Diproses') ||
                                $model->userApplyData->idApplyLowonganStatus->id_apply_lowongan_status == ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Tanggal Microteaching') ||
                                $model->userApplyData->idApplyLowonganStatus->id_apply_lowongan_status == ApplyLowonganStatus::getApplyLowonganStatusId('Memasukkan Nilai Microteaching') ||
                                $model->userApplyData->idApplyLowonganStatus->id_apply_lowongan_status == ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Tanggal Psikotes') ||
                                $model->userApplyData->idApplyLowonganStatus->id_apply_lowongan_status == ApplyLowonganStatus::getApplyLowonganStatusId('Memasukkan Nilai Psikotes') ||
                                $model->userApplyData->idApplyLowonganStatus->id_apply_lowongan_status == ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Tanggal Tes Kesehatan') ||
                                $model->userApplyData->idApplyLowonganStatus->id_apply_lowongan_status == ApplyLowonganStatus::getApplyLowonganStatusId('Memasukkan Nilai Tes Kesehatan') ||
                                $model->userApplyData->idApplyLowonganStatus->id_apply_lowongan_status == ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Kelulusan Microteaching') ||
                                $model->userApplyData->idApplyLowonganStatus->id_apply_lowongan_status == ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Kelulusan Psikotes') ||
                                $model->userApplyData->idApplyLowonganStatus->id_apply_lowongan_status == ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Kelulusan Tes Kesehatan'))
                                    echo 'label-warning';
                                elseif ($model->userApplyData->idApplyLowonganStatus->id_apply_lowongan_status == ApplyLowonganStatus::getApplyLowonganStatusId('Diterima')||
                                $model->userApplyData->idApplyLowonganStatus->id_apply_lowongan_status == ApplyLowonganStatus::getApplyLowonganStatusId('Lulus Seleksi Berkas')||
                                $model->userApplyData->idApplyLowonganStatus->id_apply_lowongan_status == ApplyLowonganStatus::getApplyLowonganStatusId('Lulus Tes Microteaching')||
                                $model->userApplyData->idApplyLowonganStatus->id_apply_lowongan_status == ApplyLowonganStatus::getApplyLowonganStatusId('Lulus Psikotes')||
                                $model->userApplyData->idApplyLowonganStatus->id_apply_lowongan_status == ApplyLowonganStatus::getApplyLowonganStatusId('Lulus Tes Kesehatan'))
                                    echo 'label-success';
                                elseif ($model->userApplyData->idApplyLowonganStatus->id_apply_lowongan_status == ApplyLowonganStatus::getApplyLowonganStatusId('Ditolak'))
                                    echo 'label-danger';
                                echo '">' . $model->userApplyData->idApplyLowonganStatus->status . '</span></strong></h4>';
                        } }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="box box-gray">
            <div class="box-body" style="min-height:500px ;max-height: 500px; overflow-y: scroll;">
                <div class="row">
                    <div class="col-md-12">
                        <h4><strong>Deskripsi Pekerjaan</strong></h4>
                
                        <hr/>
                   
                        <?= Html::decode($model->deskripsi_pekerjaan) ?>
                        <div class="col-md-12" align="center">
                            <hr />
                            <?php
                             if(!Yii::$app->user->isGuest){
     if(!$already_applied_here && !$already_applied_elsewhere && !$already_accepted_elsewhere && !$a2
     && !$a3 && !$a4 && !$a5 && !$a6 && !$a7 && !$a8 && !$a9 && !$a10 && !$a11 && !$a12 && !$a13 && !$a14 && !$a15) {
        ?> <h3><strong>Apply Lamaran</strong></h3><br> <?php
         $form = ActiveForm::begin([
             'action' => ['reqdosen/lowongan-kerja-apply', 'id' => $model->id_request],
             'options' => ['enctype' => 'multipart/form-data']
          ]);
          echo $form->field($model_form, 'foto')->fileInput();
          echo $form->field($model_form, 'ktp')->fileInput();
          echo $form->field($model_form, 'cv')->fileInput();
          echo $form->field($model_form, 'ijazah')->fileInput();
          echo $form->field($model_form, 'kartu_keluarga')->fileInput();
          echo $form->field($model_form, 'skck')->fileInput();
          echo $form->field($model_form, 'transkrip_nilai')->fileInput();
          echo $form->field($model_form, 'keterangan_pengalaman_kerja')->fileInput();

          echo Html::submitButton('Apply', ['class' => 'btn btn-primary']);

          ActiveForm::end();
         } 
        }else{ ?>
            <h3><strong><?=Html::a('Login untuk melamar', ['site/login']); ?></strong></h3>
        <?php }
         ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="box box-gray">
            <div class="box-body" style="min-height:500px ;max-height: 500px; overflow-y: scroll;">
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

