<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Unit;
use backend\models\UnitReqdosenRelation;
use backend\models\Reqdosen;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReqdosenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
if(Yii::$app->user->identity->isAdminKoordinatorUnit){
    $this->title = 'Request Dosen';
}else{
    $this->title = 'Daftar Permintaan Dosen';
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reqdosen-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
        $req = Reqdosen::find()->one();
        $req2 = $req->id_request;
        $nama = UnitReqdosenRelation::find('id_unit')->where(['id_reqdosen' => $req2])->one();
        $unit = Unit::find()->where(['id_unit'=>$nama])->one();
    ?>
    <p>
        <?= Yii::$app->user->identity->isAdminKoordinatorUnit ?  Html::a('Buat Request', ['request-dosen-add'], ['class' => 'btn btn-success']) : ''?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id_request',
            'idMatkul.nama_matkul',
            'jumlah_dosen',
            'idLowonganStatus.status',
            // [
            //     'label' => 'Koordinator Unit',
            //     'value' => $unit->nama_unit,
            //     // 'filter' => Html::activeDropDownList($searchModel, 'user_role', \backend\models\Role::getUserRoleList(),['class'=>'form-control','prompt' => 'All']),
            // ],
//            'deskripsi_pekerjaan:ntext',
            // 'spesifikasi_dosen:ntext',

            [
                'format' => 'raw',
                'value' => function($model, $key, $index, $column) {
                    return Html::a('Lihat', ['request-dosen-view', 'id' => $model->id_request], ['class' => 'btn btn-primary']);
                }
            ],
        ],
    ]); ?>
</div>
