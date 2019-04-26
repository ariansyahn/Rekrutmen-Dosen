<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Akun */

$this->title = 'Update Akun: ' . $model->id_akun;
$this->params['breadcrumbs'][] = ['label' => 'Akuns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_akun, 'url' => ['view', 'id' => $model->id_akun]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="akun-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
