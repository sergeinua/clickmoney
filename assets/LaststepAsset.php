<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

class LaststepAsset extends AppAssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/membership_exit.css',
    ];
    public $js;
    public $depends = [
        'app\assets\AppAsset',
        'app\assets\CaffAsset'
    ];

    public function init()
    {
        $this->js = [
            'js/jquery.animateNumber.min.js',
            'js/jquery.cookie.js',
            'js/counter.js',
            'exitsplash',
            'https://player.vimeo.com/api/player.js'
        ];

        parent::init();
    }
}
