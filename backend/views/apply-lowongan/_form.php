<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ApplyLowongan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apply-lowongan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_apply_lowongan_status')->textInput() ?>

    <?= $form->field($model, 'id_reqdosen')->textInput() ?>

    <?= $form->field($model, 'id_pelamar')->textInput() ?>

    <?= $form->field($model, 'ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ijazah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kartu_keluarga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skck')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transkrip_nilai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan_pengalaman_kerja')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
