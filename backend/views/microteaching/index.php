<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MicroteachingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Microteachings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="microteaching-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Microteaching', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_microteaching',
            'nilai_microteaching',
            'id_apply_lowongan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
