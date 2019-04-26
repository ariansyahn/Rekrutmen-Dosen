<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Reqdosen */

$this->title = 'Membuat Request Dosen';
$this->params['breadcrumbs'][] = ['label' => 'Request Dosen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
