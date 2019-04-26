<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Microteaching */

$this->title = 'Create Microteaching';
$this->params['breadcrumbs'][] = ['label' => 'Microteachings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="microteaching-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
