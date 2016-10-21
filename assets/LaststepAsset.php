<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

class LaststepAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/membership_exit.css',
    ];
    public $js;
    public $depends = [
        'app\assets\AppAsset'
    ];

    public function init()
    {
        $this->js = [
            'js/jquery.animateNumber.min.js',
            'js/jquery.cookie.js',
            'https://gaff.s3.amazonaws.com/js/gaff.js',
            'https://s3.amazonaws.com/caff/js/formhelpers.min.js',
            'js/counter.js',
            'exitsplash'
        ];

        parent::init();
    }
}
