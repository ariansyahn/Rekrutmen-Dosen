<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TanggalTesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tanggal-tes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tanggal_tes') ?>

    <?= $form->field($model, 'tanggal_microteaching') ?>

    <?= $form->field($model, 'tanggal_psikotes') ?>

    <?= $form->field($model, 'tanggal_kesehatan') ?>

    <?= $form->field($model, 'id_apply_lowongan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
