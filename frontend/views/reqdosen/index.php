<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReqdosenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lowongan Kerja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reqdosen-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
            <div class="col-md-8">
                <?php
                if(count($dataProvider) == 0){
                    echo '<p class="alert-danger">Maaf lowongan kerja yang anda cari tidak tersedia.</p>';
                }
                foreach ($dataProvider as $dp)
                {
                    echo '<div class="box box-default">'
                        .'<div class="box-body">'
                        .'<div class="row">'
                        .'<div class="col-md-8">'
                        .'<h3>'
                        .'<strong>' .Html::encode($dp->idMatkul->nama_matkul) . '</strong>'
                        .'<br/>'
                        .'</h3>'
                        .'</div>'
                        .'<div class="col-md-4">'
                        .'<div class="col-md-12" align="right">'
                        .'<br/>'
                        . Html::a('Rincian', ['view', 'id' => $dp->id_request], ['class' => 'btn btn-primary'])
                        .'</div>'
                        .'<br/>'
                        .'</div>'
                        .'</div>';

                    echo '</div>'
                        .'</div>';
                        
                }
                echo LinkPager::widget([
                    'pagination' => $pages,
                ]);
                ?>
            </div>
                </div>
</div>
