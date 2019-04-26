<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ApplyLowongan */

$this->title = 'Update Apply Lowongan: ' . $model->id_apply_lowongan;
$this->params['breadcrumbs'][] = ['label' => 'Apply Lowongans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_apply_lowongan, 'url' => ['view', 'id' => $model->id_apply_lowongan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apply-lowongan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
