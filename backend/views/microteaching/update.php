<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Microteaching */

$this->title = 'Update Microteaching: ' . $model->id_microteaching;
$this->params['breadcrumbs'][] = ['label' => 'Microteachings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_microteaching, 'url' => ['view', 'id' => $model->id_microteaching]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="microteaching-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
