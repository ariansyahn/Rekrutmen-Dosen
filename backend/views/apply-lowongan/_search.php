<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ApplyLowonganSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apply-lowongan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_apply_lowongan') ?>

    <?= $form->field($model, 'id_apply_lowongan_status') ?>

    <?= $form->field($model, 'id_reqdosen') ?>

    <?= $form->field($model, 'id_pelamar') ?>

    <?= $form->field($model, 'ktp') ?>

    <?php // echo $form->field($model, 'cv') ?>

    <?php // echo $form->field($model, 'ijazah') ?>

    <?php // echo $form->field($model, 'kartu_keluarga') ?>

    <?php // echo $form->field($model, 'skck') ?>

    <?php // echo $form->field($model, 'transkrip_nilai') ?>

    <?php // echo $form->field($model, 'keterangan_pengalaman_kerja') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
