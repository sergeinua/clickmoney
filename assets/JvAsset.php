<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

class JvAsset extends AppAssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'contest/css/demo.css',
        'contest/css/powerange.css',
        'contest/css/leaderboard_new.css?v=127',
        'contest/css/animate.css',
        'http://fonts.googleapis.com/css?family=Lato:400,700,900'
    ];
    public $js;
    public $depends = [
        'app\assets\AppAsset'
    ];

    public function init()
    {
        $this->js = [
//            'js/main.js',
            'contest/js/bootstrap.min.js',
            'contest/js/contest-2.js?v=4',
            'contest/js/powerange.js',
            'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js',
            'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'
        ];

        parent::init();
    }
}
