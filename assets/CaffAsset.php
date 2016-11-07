<?php

namespace app\assets;

use yii\web\AssetBundle;

class CaffAsset extends AppAssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'https://gaff.s3.amazonaws.com/js/gaff.js',
        'js/members_forms.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
