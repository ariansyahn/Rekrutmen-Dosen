<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\builder\Form;

/* @var $this yii\web\View */
/* @var $model backend\models\form\NilaiMicroForm */
/* @var $currentDate string */
?>
<?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL]); ?>
<div class="container-fluid">
    <div class="header-container">
<div class="col-md-8">
    <div class="panel box box-primary">
        <div class="box-header with-border">

            <div class="row">
                    <div class="col-md-12">
                        <?= Form::widget([
                            'model' => $model,
                            'form' => $form,
                            'columns' => 1,
                            'attributes' => [
                                'nilai_microteaching' => [
                                    'type' => Form::INPUT_TEXT,
                                    'options' => [
                                        'maxlength' => true,
                                    ],
                                ],
                            ],
                        ]) ?>
                    </div>
                </div>

        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
</div>
</div>