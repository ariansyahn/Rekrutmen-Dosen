<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TanggalTesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tanggal Tes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tanggal-tes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tanggal Tes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tanggal_tes',
            'tanggal_microteaching',
            'tanggal_psikotes',
            'tanggal_kesehatan',
            'id_apply_lowongan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
