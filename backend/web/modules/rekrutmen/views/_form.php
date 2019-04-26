<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\rekrutmen\models\TReqdosen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="treqdosen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'matakuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_dosen')->textInput() ?>

    <?= $form->field($model, 'deskripsi_pekerjaan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'spesifikasi_dosen')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status_request')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_koordinator')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
