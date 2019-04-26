<?php
use yii\helpers\Html;
?>
<header class="main-header">
    <?= Html::a('<span class="logo-mini">RDD</span><span class="logo-lg">' . "REKRUTMEN" . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<?= Html::img('@web/img/user1-128x128.jpg', ['class' => 'user-image', 'alt'=>'User Image']) ?>
                  <span class="hidden-xs"> <?= preg_replace('/@.*?$/', '', Yii::$app->user->identity->email) ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <?= Html::img('@web/img/user1-128x128.jpg', ['class' => 'img-circle', 'alt'=>'User Image']) ?>
                      <p>
                          <?= preg_replace('/@.*?$/', '', Yii::$app->user->identity->email) ?>
                      </p>
                  </li>
                  <!-- Menu Body -->
<!--                  <li class="user-body">-->
<!--                    <div class="col-xs-4 text-center">-->
<!--                      <a href="#">Followers</a>-->
<!--                    </div>-->
<!--                    <div class="col-xs-4 text-center">-->
<!--                      <a href="#">Sales</a>-->
<!--                    </div>-->
<!--                    <div class="col-xs-4 text-center">-->
<!--                      <a href="#">Friends</a>-->
<!--                    </div>-->
<!--                  </li>-->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                        <?= Html::a(
                            'Sign out',
                            ['/site/logout'],
                            ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                        ) ?>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </div>
        </nav>
      </header>
