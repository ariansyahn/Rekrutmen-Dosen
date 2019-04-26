<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TesKesehatan */

$this->title = 'Create Tes Kesehatan';
$this->params['breadcrumbs'][] = ['label' => 'Tes Kesehatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tes-kesehatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
