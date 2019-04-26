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
    'css/site.css',
    'css/custom-navbar.css',
    'css/custom-navbar-bottom.css',
    'css/dual-navbar.css',
    'css/col-centered.css',
    'css/footer.css',

    'css/blue-box.css',
    'css/flat-button.css',
    'css/flat-input.css',

    'css/login.css'
];
    public $js = [
        'js/bootstrap.min.js',
        'js/login.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
