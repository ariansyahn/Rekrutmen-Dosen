<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        'css/custom-navbar.css',
    'css/custom-navbar-bottom.css',
    'css/dual-navbar.css',
    'css/col-centered.css',
        'css/site.css',
        'css/footer.css',
        // 'hiasan/bootstrap.min.css',
        'hiasan/business-casual.min.css',
        'css/blue-box.css',
        'css/flat-button.css',
        'css/flat-input.css',
    //'themes/margo/asset/css/bootstrap.min.css',
    ];
    public $js = [
         // 'hiasan/jquery.min.js',
         // 'hiasan/bootstrap.bundle.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
