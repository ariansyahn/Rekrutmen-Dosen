<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TesKesehatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tes-kesehatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nilai_tes_kesehatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_apply_lowongan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
