<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AkunSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .label { 
        font-size: 90%; 
    }
</style>
<div class="akun-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Tambah Admin HRD', ['admin-hrd-add'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Tambah Koordinator Unit', ['admin-koordinator-add'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'email:email',
          
            [
                'label' => 'Role',
                'format' => 'raw',
                // 'value' => 'role.nama',
                'value' => function($model, $key, $index, $column) {
                    if($model->role->id_role == \backend\models\Role::getUserRoleId('Super Admin'))
                        $label_tag = 'label-danger';
                    else if($model->role->id_role == \backend\models\Role::getUserRoleId('Admin HRD'))
                        $label_tag = 'label-success';
                    else if($model->role->id_role == \backend\models\Role::getUserRoleId('Admin Koordinator Unit'))
                        $label_tag = 'label-info';
                    else
                        $label_tag = 'label-warning';
                    return Html::tag('span', $model->role->nama_role, ['class' => 'label ' . $label_tag]);
                },
                'filter' => Html::activeDropDownList($searchModel, 'user_role', \backend\models\Role::getUserRoleList(),['class'=>'form-control','prompt' => 'All']),
            ],
            
            [
                'label' => 'Action',
                'format' => 'raw',
                'value' => function($model, $key, $index, $column) {
                    return Html::a('Lihat', ['view', 'id' => $model->id_akun], ['class' => 'btn btn-primary']);
                }
            ],
        ],
    ]); ?>
</div>
