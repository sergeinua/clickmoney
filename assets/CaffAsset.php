<?php

namespace app\assets;

use yii\web\AssetBundle;

class CaffAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'https://gaff.s3.amazonaws.com/js/gaff.js',
        'https://s3.amazonaws.com/caff/js/formhelpers.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
