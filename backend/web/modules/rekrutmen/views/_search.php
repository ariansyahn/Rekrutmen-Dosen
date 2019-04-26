<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\rekrutmen\models\search\TReqdosenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="treqdosen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_request') ?>

    <?= $form->field($model, 'matakuliah') ?>

    <?= $form->field($model, 'jumlah_dosen') ?>

    <?= $form->field($model, 'deskripsi_pekerjaan') ?>

    <?= $form->field($model, 'spesifikasi_dosen') ?>

    <?php // echo $form->field($model, 'status_request') ?>

    <?php // echo $form->field($model, 'id_koordinator') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
