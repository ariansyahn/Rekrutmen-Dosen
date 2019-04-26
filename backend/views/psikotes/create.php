<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Psikotes */

$this->title = 'Create Psikotes';
$this->params['breadcrumbs'][] = ['label' => 'Psikotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="psikotes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
