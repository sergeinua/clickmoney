<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

class ExitAsset extends AppAssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/fe1.css',
        'css/exit.css',
    ];
    public $js;
    public $depends = [
        'app\assets\AppAsset'
    ];

    public function init()
    {
        $this->js = [
            'js/jquery.animateNumber.min.js',
            'js/freereport.js',
            'validate?form=' . \Yii::$app->controller->action->id,
        ];

        parent::init();
    }
}
