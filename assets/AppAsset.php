<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/style.css',
//        'css/bootstrap.min.css',
//        'css/fe1.css',
    ];
    public $js;
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init()
    {
        $this->js = [
            'https://s3.amazonaws.com/caff/js/formhelpers.min.js',
            'js/main.js',
            'js/jquery.blockUI.js',
            'js/people_filling.js',
            'validate?form=' . \Yii::$app->controller->action->id,
            'exitsplash'
        ];

        parent::init();
    }
}
