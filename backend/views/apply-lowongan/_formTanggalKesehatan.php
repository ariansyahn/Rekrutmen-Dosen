<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\builder\Form;

/* @var $this yii\web\View */
/* @var $model backend\models\form\TanggalForm */
/* @var $currentDate string */
?>
<?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL]); ?>
<div class="container-fluid">
    <div class="header-container">
<div class="col-md-8">
    <div class="panel box box-primary">
        <div class="box-header with-border">

            <div class="row">
                    <div class="col-md-8">

                        <?= Form::widget([
                            'model' => $model,
                            'form' => $form,
                            'columns' => 1,
                            'attributes' => [
                                'tanggal_kesehatan' => [
                                    'type'=>Form::INPUT_WIDGET,
                                    'widgetClass'=>'\kartik\widgets\DatePicker',
                                    'options'=>[
                                        'readonly' => true,
                                        'pluginOptions' => [
                                            'format' => 'dd MM yyyy',
                                            'startDate' => $currentDate,
                                        ],
                                    ],
                                ],
                            ]
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