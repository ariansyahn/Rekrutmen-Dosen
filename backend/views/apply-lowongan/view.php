<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\ApplyLowongan */
/* @var $micro backend\models\Microteaching */
/* @var $psiko backend\models\Psikotes */
/* @var $sehat backend\models\TesKesehatan */

$this->title = $model->idPelamar->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Lamaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php if($model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Sedang Diproses')) {
        ?>
        <?=   Yii::$app->user->identity->isAdminHRD ? Html::a('Lulus', ['apply-lowongan-lulus-berkas', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => 'Apakah Anda Yakin?',
                'method' => 'post',
            ],
        ]):'' ; ?>
        <?= Yii::$app->user->identity->isAdminHRD ? Html::a('Tidak Lulus', ['apply-lowongan-ditolak', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah Anda Yakin?',
                'method' => 'post',
            ],
        ]) :'' ;    ?>
     <?php } ?>
     <?php if($model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Lulus Seleksi Berkas')) {
        ?>
        <!-- <h5>Menunggu Konfirmasi Koordinator Unit</h5> -->
        <?=   Yii::$app->user->identity->isAdminKoordinatorUnit ? Html::a('Lulus', ['apply-lowongan-tentukan-tanggal-microteaching', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => 'Apakah Anda Yakin?',
                'method' => 'post',
            ],
        ]):'' ; ?>
        <?= Yii::$app->user->identity->isAdminKoordinatorUnit ? Html::a('Tidak Lulus', ['apply-lowongan-ditolak', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah Anda Yakin?',
                'method' => 'post',
            ],
        ]) :'' ;    ?>
     <?php } ?>

     <?php if($model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Tanggal Microteaching')) {
        ?>
        <?=   Yii::$app->user->identity->isAdminHRD ? Html::a('Buat Tanggal Microteaching', ['menentukan-tanggal-microteaching', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-primary',]):'' ; ?>
           
     <?php } ?>

       <?php if($model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Memasukkan Nilai Microteaching')) {
        ?>
        
             <?=   Yii::$app->user->identity->isAdminHRD ? Html::a('Update Tanggal Microteaching', ['update-tanggal-microteaching', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-primary',]):'' ; ?>
            <?=   Yii::$app->user->identity->isAdminKoordinatorUnit ? Html::a('Input Nilai Microteaching', ['input-nilai-microteaching', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-primary',]):'' ; ?>

     <?php } ?>

     <?php if($model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Kelulusan Microteaching')) {
        ?>
        <!-- update nilai microteaching by koor -->

        <?=   Yii::$app->user->identity->isAdminKoordinatorUnit ? Html::a('Update Nilai Microteaching', ['update-nilai-microteaching', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-primary',]):'' ; ?>

        
        <?=   Yii::$app->user->identity->isAdminHRD ? Html::a('Lulus', ['apply-lowongan-lulus-microteaching', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => 'Apakah Anda Yakin?',
                'method' => 'post',
            ],
        ]):'' ; ?>
        <?= Yii::$app->user->identity->isAdminHRD ? Html::a('Tidak Lulus', ['apply-lowongan-ditolak', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah Anda Yakin?',
                'method' => 'post',
            ],
        ]) :'' ;    ?>

     <?php } ?>

     <?php if($model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Lulus Tes Microteaching')) {
        ?>
        
        <?=   Yii::$app->user->identity->isAdminHRD ? Html::a('Lanjut Psikotes', ['apply-lowongan-lanjut-psikotes', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => 'Apakah Anda Yakin?',
                'method' => 'post',
            ],
        ]):'' ; ?>

     <?php } ?>

       <?php if($model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Tanggal Psikotes')) {
        ?>
        <?=   Yii::$app->user->identity->isAdminHRD ? Html::a('Buat Tanggal Psikotes', ['menentukan-tanggal-psikotes', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-primary',]):'' ; ?>
           
     <?php } ?>

        <?php if($model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Memasukkan Nilai Psikotes')) {
        ?>
        
             <?=   Yii::$app->user->identity->isAdminHRD ? Html::a('Update Tanggal Psikotes', ['update-tanggal-psikotes', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-primary',]):'' ; ?>
            <?=   Yii::$app->user->identity->isAdminHRD ? Html::a('Input Nilai Psikotes', ['input-nilai-psikotes', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-primary',]):'' ; ?>

     <?php } ?>

     <?php if($model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Kelulusan Psikotes')) {
        ?>
        <!-- update nilai psikotes by hrd -->

        <?=   Yii::$app->user->identity->isAdminHRD ? Html::a('Update Nilai Psikotes', ['update-nilai-psikotes', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-primary',]):'' ; ?>
        
        <?=   Yii::$app->user->identity->isAdminHRD ? Html::a('Lulus', ['apply-lowongan-lulus-psikotes', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => 'Apakah Anda Yakin?',
                'method' => 'post',
            ],
        ]):'' ; ?>
        <?= Yii::$app->user->identity->isAdminHRD ? Html::a('Tidak Lulus', ['apply-lowongan-ditolak', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah Anda Yakin?',
                'method' => 'post',
            ],
        ]) :'' ;    ?>

     <?php } ?>

     <?php if($model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Lulus Psikotes')) {
        ?>
        <!-- update nilai microteaching by koor -->
        
        <?=   Yii::$app->user->identity->isAdminHRD ? Html::a('Lanjut Tes Kesehatan', ['apply-lowongan-lanjut-kesehatan', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => 'Apakah Anda Yakin?',
                'method' => 'post',
            ],
        ]):'' ; ?>

     <?php } ?>

       <?php if($model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Tanggal Tes Kesehatan')) {
        ?>
        <?=   Yii::$app->user->identity->isAdminHRD ? Html::a('Buat Tanggal Tes Kesehatan', ['menentukan-tanggal-kesehatan', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-primary',]):'' ; ?>
           
     <?php } ?>

        <?php if($model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Memasukkan Nilai Tes Kesehatan')) {
        ?>
        
             <?=   Yii::$app->user->identity->isAdminHRD ? Html::a('Update Tanggal Tes Kesehatan', ['update-tanggal-kesehatan', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-primary',]):'' ; ?>
            <?=   Yii::$app->user->identity->isAdminHRD ? Html::a('Input Nilai Tes Kesehatan', ['input-nilai-kesehatan', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-primary',]):'' ; ?>

     <?php } ?>

     <?php if($model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Kelulusan Tes Kesehatan')) {
        ?>
        <!-- update nilai kesehatan by hrd -->

        <?=   Yii::$app->user->identity->isAdminHRD ? Html::a('Update Nilai Tes Kesehatan', ['update-nilai-kesehatan', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-primary',]):'' ; ?>
        
        <?=   Yii::$app->user->identity->isAdminHRD ? Html::a('Lulus', ['apply-lowongan-lulus-kesehatan', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => 'Apakah Anda Yakin?',
                'method' => 'post',
            ],
        ]):'' ; ?>
        <?= Yii::$app->user->identity->isAdminHRD ? Html::a('Tidak Lulus', ['apply-lowongan-ditolak', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah Anda Yakin?',
                'method' => 'post',
            ],
        ]) :'' ;    ?>

     <?php } ?>

     <?php if($model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Lulus Tes Kesehatan')) {
        ?>
        <!-- update nilai microteaching by koor -->
        
        <?=   Yii::$app->user->identity->isAdminHRD ? Html::a('Diterima', ['apply-lowongan-diterima', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => 'Apakah Anda Yakin?',
                'method' => 'post',
            ],
        ]):'' ; ?>
          <?= Yii::$app->user->identity->isAdminHRD ? Html::a('Ditolak', ['apply-lowongan-ditolak', 'id' => $model->id_apply_lowongan],[
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah Anda Yakin?',
                'method' => 'post',
            ],
        ]) :'' ;    ?>

     <?php } ?>

    </p>
   
    <?= DetailView::widget([
        'model' => $model,
        // 'model' => $micro,
        // 'model' => $psiko,
        // 'model' => $sehat,
        'attributes' => [
            'idPelamar.nama_lengkap',
            'idReqdosen.idMatkul.nama_matkul',
            'idApplyLowonganStatus.status',
            [
                'attribute' => 'file',
                'label' => 'Foto (3x4)',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->foto != null ? Html::a('Download Foto', '../web/uploads/berkas_pelamar/' . $model->foto) : '-';
                }
            ],
            [
                'attribute' => 'file',
                'label' => 'KTP',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->ktp != null ? Html::a('Download KTP', '../web/uploads/berkas_pelamar/' . $model->ktp) : '-';
                }
            ],
            [
                'attribute' => 'file',
                'label' => 'CV',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->cv != null ? Html::a('Download CV', '../web/uploads/berkas_pelamar/' . $model->cv) : '-';
                }
            ],
            [
                'attribute' => 'file',
                'label' => 'Ijazah',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->ijazah != null ? Html::a('Download Ijazah', '../web/uploads/berkas_pelamar/' . $model->ijazah) : '-';
                }
            ],
            [
                'attribute' => 'file',
                'label' => 'Kartu Keluarga',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->kartu_keluarga != null ? Html::a('Download KK', '../web/uploads/berkas_pelamar/' . $model->kartu_keluarga) : '-';
                }
            ],
            [
                'attribute' => 'file',
                'label' => 'SKCK',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->skck != null ? Html::a('Download SKCK', '../web/uploads/berkas_pelamar/' . $model->skck) : '-';
                }
            ],
            [
                'attribute' => 'file',
                'label' => 'Transkrip Nilai',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->transkrip_nilai != null ? Html::a('Download Transkrip Nilai', '../web/uploads/berkas_pelamar/' . $model->transkrip_nilai) : '-';
                }
            ],
            [
                'attribute' => 'file',
                'label' => 'Keterangan Pengalaman Kerja',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->keterangan_pengalaman_kerja != null ? Html::a('Download Keterangan Pengalaman Kerja', '../web/uploads/berkas_pelamar/' . $model->keterangan_pengalaman_kerja) : '-';
                }
            ],
            
        ],
    ]) ?>

 <?php if($model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Kelulusan Microteaching') || 
 $model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Lulus Tes Microteaching')||
 $model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Tanggal Psikotes')||
 $model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Memasukkan Nilai Psikotes')||
 $model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Lulus Psikotes')||
 $model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Kelulusan Psikotes')||
 $model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Tanggal Tes Kesehatan')||
 $model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Memasukkan Nilai Tes Kesehatan')||
 $model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Lulus Tes Kesehatan')||
 $model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Kelulusan Tes Kesehatan')||
 $model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Diterima')) {
        ?>
     <?= DetailView::widget([
        'model' => $micro,
        'attributes' => [
            'nilai_microteaching',
        ],
    ]) ?>
 <?php } ?>

 <?php if($model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Kelulusan Psikotes')||
 $model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Tanggal Tes Kesehatan')||
 $model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Memasukkan Nilai Tes Kesehatan')||
 $model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Lulus Tes Kesehatan')||
 $model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Lulus Psikotes')||
 $model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Kelulusan Tes Kesehatan')||
 $model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Diterima')) {
        ?>
     <?= DetailView::widget([
        'model' => $psiko,
        'attributes' => [
            'nilai_psikotes',
        ],
    ]) ?>
    <?php } ?>
 <?php if($model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Menentukan Kelulusan Tes Kesehatan')||
 $model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Lulus Tes Kesehatan') || $model->id_apply_lowongan_status == \backend\models\ApplyLowonganStatus::getApplyLowonganStatusId('Diterima'))  {
        ?>
     <?= DetailView::widget([
        'model' => $sehat,
        'attributes' => [
            'nilai_tes_kesehatan',
            'keterangan',
        ],
    ]) ?>
    <?php } ?>
