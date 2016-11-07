<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

class MainAsset extends AppAssetBundle
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
            'js/main.js',
            'js/people_filling.js',
            'js/counter.js',
            'validate?form=' . \Yii::$app->controller->action->id,
            'exitsplash',
            'https://player.vimeo.com/api/player.js'
        ];

        parent::init();
    }
}
