<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\rekrutmen\models\TReqdosen */

$this->title = 'Create Treqdosen';
$this->params['breadcrumbs'][] = ['label' => 'Treqdosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treqdosen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
