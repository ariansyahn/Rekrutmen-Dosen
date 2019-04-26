<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\AdminKoordinatorAddForm */

$unit = ['D3 Teknik Informatika'=>'D3 Teknik Informatika','D4 Teknik Informatika'=>'D4 Teknik Informatika',
    'D3 Teknik Komputer'=>'D3 Teknik Komputer','S1 Teknik Informatika'=>'S1 Teknik Informatika',
    'S1 Sistem Informasi'=>'S1 Sistem Informasi','S1 Teknik Elektro'=>'S1 Teknik Elektro',
    'S1 Manajemen Rekayasa'=>'S1 Manajemen Rekayasa','S1 Teknik Bioproses'=>'S1 Teknik Bioproses',
    'UPT Bahasa'=>'UPT Bahasa','UPT Science and Mathematics'=>'UPT Science and Mathematics',];

$this->title = 'Tambah Admin Koordinator Unit';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">

    <div class="col-md-6">
        <h2><?= Html::encode($this->title) ?></h2>
        <div class="panel box box-primary">
            <div class="box-header with-border">

        <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput()?>

                <?= $form->field($model, 'unit')->dropDownList($unit, ['prompt' => 'Mohon pilih Unit'])->label('Unit') ?>

        <div class="form-group">
            <?= Html::submitButton('Tambah', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>
