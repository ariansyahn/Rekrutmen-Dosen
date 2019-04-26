<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Reqdosen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reqdosen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_matkul')->textInput() ?>

    <?= $form->field($model, 'id_lowongan_status')->textInput() ?>

    <?= $form->field($model, 'jumlah_dosen')->textInput() ?>

    <?= $form->field($model, 'deskripsi_pekerjaan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'spesifikasi_dosen')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
