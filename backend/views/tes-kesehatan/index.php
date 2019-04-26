<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TesKesehatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tes Kesehatans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tes-kesehatan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tes Kesehatan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tes_kesehatan',
            'nilai_tes_kesehatan',
            'id_apply_lowongan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
