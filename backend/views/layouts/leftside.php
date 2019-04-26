<?php

use adminlte\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

    <?php
        // $user_id = Yii::$app->user->identity->id_akun;
        // $usern = backend\models\Akun::findOne(['id_akun' => $user_id]);
        // $role = $usern->id_role;
        // $valueSuperAdmin = false;
        // $valueAdminHRD = false;
        // $valueKoordinatorUnit = false;

        // if($role == 1){
        //     $valueSuperAdmin =true;
        // }else if($role == 2){
        //     $valueAdminHRD = true;
        // }else if($role == 3){
        //     $valueKoordinatorUnit = true;
        // }

    ?>
        <?=
        Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        ['label' => 'Menu', 'options' => ['class' => 'header']],
                        ['label' => 'Beranda', 'icon' => 'fa fa-home', 'url' => ['/site'] ],
                        ['label' => 'User', 'icon' => 'fa fa-users', 'url' => ['/akun'], 'visible' => Yii::$app->user->identity->isSuperAdmin],
                        ['label' => 'Request Dosen', 'icon' => 'fa fa-book', 'url' => ['/reqdosen'],'visible' => Yii::$app->user->identity->isAdminKoordinatorUnit],
                        ['label' => 'Daftar Permintaan Dosen', 'icon' => 'fa fa-book', 'url' => ['/reqdosen'],'visible' => Yii::$app->user->identity->isSuperAdmin || Yii::$app->user->identity->isAdminHRD],
                        ['label' => 'Daftar Lamaran', 'icon' => 'fa fa-briefcase', 'url' => ['/apply-lowongan'],],
                        ['label' => 'System', 'options' => ['class' => 'header'],'visible' => Yii::$app->user->identity->isSuperAdmin],
                        ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],'visible' => Yii::$app->user->identity->isSuperAdmin],
                        // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ],
                ]
        )
        ?>
        
    </section>
    <!-- /.sidebar -->
</aside>
