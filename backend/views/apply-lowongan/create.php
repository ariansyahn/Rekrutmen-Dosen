<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ApplyLowongan */

$this->title = 'Create Apply Lowongan';
$this->params['breadcrumbs'][] = ['label' => 'Apply Lowongan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apply-lowongan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formTanggalMicro', [
        'model' => $model,
        'currentDate' => $currentDate, 
    ]) ?>

</div>
