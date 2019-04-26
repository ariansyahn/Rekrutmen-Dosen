<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<!-- tambahan warna -->
<body class="hold-transition skin-red sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'REKRUTMEN',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'id' => 'custom-bootstrap-menu',
            'class' => 'navbar navbar-default navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Beranda', 'url' => ['/site/index']],
        // ['label' => 'Tentang', 'url' => ['/site/about']],
        // ['label' => 'Kontak', 'url' => ['/site/contact']],
    ['label' => 'Lowongan Pekerjaan', 'url' => ['/reqdosen/index']]
    ];

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Daftar', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
       
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . preg_replace('/@.*?$/', '', Yii::$app->user->identity->email) . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

 <!-- Footer -->
 <div class="footer-body">
        <div class="footer-social-icons">
            <center>
                <div class="col-md-3">
                    <br/>
                    <img src="../web/img/itdel.png" height="90px">
                </div>
                <div class="col-md-9" style="text-align: left">
                    <hr/>
                    <h4>Sistem Rekrutmen Dosen</h4>
                    <h5>Institut Teknologi Del</h5>
                </div>
            </center>

            <span class="glyphicon glyphicon-prints" aria-hidden="true"></span> 
            

        </div>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
