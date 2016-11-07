<?php
namespace app\assets;

use yii\web\AssetBundle;
use Yii;
use yii\base\Exception;

class AppAssetBundle extends AssetBundle
{
    public function init()
    {
        foreach ($this->js as $key => $value) {
            if ((strpos($value, 'js/') &&  strpos($value, 'http')) == false) {
                if (file_exists(Yii::getAlias('@app/web/' . $value))) {
                    $this->js[$key] = $value . '?v=' . filemtime(Yii::getAlias('@app/web/' . $value));
                }
            }
        }

        foreach ($this->css as $key => $value) {
            if ((strpos($value, 'css/') &&  strpos($value, 'http')) == false) {
                if (file_exists(Yii::getAlias('@app/web/' . $value))) {
                    $this->css[$key] = $value . '?v=' . filemtime(Yii::getAlias('@app/web/' . $value));
                }
            }
        }
    }
}