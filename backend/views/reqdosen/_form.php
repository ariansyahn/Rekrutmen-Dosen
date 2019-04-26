<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\builder\Form;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\form\ReqdosenForm */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL]); ?>
<div class="container-fluid">
    <div class="header-container">
<div class="col-md-8">
    <div class="panel box box-primary">
        <div class="box-header with-border">

            <div class="row">
                <div class="col-md-6">

                    <?= Form::widget([
                        'model' => $model,
                        'form' => $form,
                        'attributes' => [
                            'id_matkul' => [
                                'type'=>Form::INPUT_WIDGET,
                                'widgetClass'=>'\kartik\widgets\Select2',
                                'options'=>[
                                    'data'=> \backend\models\Matkul::getMatkulList(),
                                    'options' => ['placeholder' => 'Pilih Mata Kuliah'],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                                ],
                            ],
                        ]
                    ]) ?>
                </div>
                <div class="col-md-6">
                    <?=
                    $form->field($model, 'jumlah_dosen', [
                        'addon' => ['append' => ['content'=>'Orang']]
                    ]);
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                <?= $form->field($model, 'spesifikasi_dosen')->widget(CKEditor::className(), [
                        'options' => ['rows' => 6],
                        'preset' => 'full'
                    ]) ?>

<!-- <?= Form::widget([       // 1 column layout
                            'model'=>$model,
                            'form'=>$form,
                            'columns'=>1,
                            'attributes'=>[
                                'spesifikasi_dosen'=>[
                                    'type'=>Form::INPUT_TEXTAREA,
                                    'options' => [
                                        'rows' => 6,
                                    ]
                                ],
                            ]
                        ]) ?> -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                <?= $form->field($model, 'deskripsi_pekerjaan')->widget(CKEditor::className(), [
                        'options' => ['rows' => 6],
                        'preset' => 'full'
                    ]) ?>
                </div>
            </div>


        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Buat Lowongan', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
</div>
</div>