<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Akun */
$this->title = $model->role->nama_role;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <h2>Data Akun</h2>
    <?=   Html::a('Hapus', ['delete', 'id' => $model->id_akun],[
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah Anda Yakin?',
                'method' => 'post',
            ],
        ])?>

        <br>
        <br>
        

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'email:email',
            'value' => 'role.nama_role',
//            'value' => 'unit.nama_unit',
            // 'unit.nama_unit',
            'created_at',
        ],
    ]) ?>

</div>
