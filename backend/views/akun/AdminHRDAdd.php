<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\Akun */

$this->title = 'Tambah Admin HRD';
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

            <div class="form-group">
                <?= Html::submitButton('Tambah', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>

</div>
