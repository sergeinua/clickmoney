<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

class MembersAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/fe1.css',
        'css/exit-popup.css'
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
            'js/counter.js',
            'exitsplash'
        ];

        parent::init();
    }
}
