<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ReqdosenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reqdosen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_request') ?>

    <?= $form->field($model, 'id_matkul') ?>

    <?= $form->field($model, 'id_lowongan_status') ?>

    <?= $form->field($model, 'jumlah_dosen') ?>

    <?= $form->field($model, 'deskripsi_pekerjaan') ?>

    <?php // echo $form->field($model, 'spesifikasi_dosen') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
