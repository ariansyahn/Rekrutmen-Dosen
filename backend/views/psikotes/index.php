<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PsikotesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Psikotes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="psikotes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Psikotes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_psikotes',
            'nilai_psikotes',
            'id_apply_lowongan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
