<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

class ClickthroughtAsset extends AppAssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/fe1.css',
        'css/style_click_through.css'
    ];
    public $js;
    public $depends = [
        'app\assets\AppAsset'
    ];

    public function init()
    {
        $this->js = [
            'exitsplash',
            'https://player.vimeo.com/api/player.js'
        ];

        parent::init();
    }
}
