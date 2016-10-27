<?php
use  Mobile_Detect;

use yii\helpers\Url;
use app\assets\AppAsset;

$this->registerCssFile(Yii::$app->request->baseUrl.'/web/css/style_click_through.css', ['depends' => [AppAsset::className()]]);
$this->registerJsFile('/exitsplash', ['depends' => [AppAsset::className()]]);

Yii::$app->params['bodyClass'] = 'clickthrough';

$script_init = <<< JS
    var exitsplashmessage = "***************************************\\n W A I T   B E F O R E   Y O U   G O !\\n\\n  CLICK *STAY ON THIS PAGE* BUTTON RIGHT NOW\\n     TO STAY GET THE EXACT METHOD THAT\\n  BANKED ME $35,827.29 IN JUST 24 HOURS!\\n\\n     >> STAY ON THIS PAGE <<\\n\\n***************************************";
    var exitsplashpage = '/approved';
JS;
$this->registerJs($script_init, yii\web\View::POS_BEGIN);

$mob = new Mobile_Detect();
if ($mob->isTablet() || $mob->isMobile()) {
    $is_mobile = true;
}

$this->title = 'ClickMoney.com';

?>
<div class="container header">
    <div class="row">
        <div class="col-md-7 col-xs-4 logo1">
            <img class="img-responsive" src="/images/ClickMoneyLogo/Logo-white.svg">
        </div>
        <div class="col-md-5 col-md-offset-7 col-xs-8 lic">
            <div class="col-md-4 licenceRight"><span>Licence Left</span></div>
            <div class="col-md-1 licenceLeft"><span>1</span></div>
        </div>
    </div>
</div>
<div class="container content">
    <div class="row content0">
        <div class="col-md-7 left_block left_block1">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item"
                        src="https://player.vimeo.com/video/189163302?autoplay=true&background=1" width="auto"
                        height="auto" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-5 right_block right_block1">
            <p class="welkGreen">WELCOME ABOARD!</p>
            <p class="clickbt">Click The Button Below</p>
            <p class="secure">To <span class="span-secr">Secure </span><span class="orange">1</span><span class="span-secr"> of the</span> <span class="orange">16</span> CLICK MONEY Biz Memberships</p>
            <div class="stop col-md-9 col-xs-9">
                <div class="col-md-3 col-xs-4">
                    <img src="/images/stop.png" class="img-responsive img_stop">
                </div>
                <div class="do_not_ex0 col-md-8 col-xs-8">
                    <p class="stop_do_not_ex orange">Please <span class="red">DO NOT</span> Exit This Page!</p>
                    <p class="stop_do_not_ex1"">Or your spot will be given to the next person in line waiting to watch this video.</p>
                </div>
                <img src="/images/arrow-for-throu.png" class="img-responsive arr1">
            </div>
            <button type="submit" class="button1 button02" onclick="window.onbeforeunload = null; window.location='/approved';">CLICK HERE TO PROCEED<img class="button-arrow" src="/images/arr.png"></button>
            <div class="button2 col-md-10 col-xs-12"><span class="button20">REMINDER:</span> <span class="orange"><span class="big-number" style="font-size: 14px;">1</span> LICENSE LEFT</span></div>
        </div>
    </div>
</div>
<div class="container footer">
    <div class="row">
        <div class="col-xs-12 col-md-1 vcenter logo">
            <a href=""><img src="images/ClickMoneyLogo/Logo-white.svg"></a>
        </div><!--
                --><div class="col-xs-12 col-md-7 vcenter menu">
            <ul>
                <li><a href="<?= Url::toRoute(['site/disclaimer']); ?>" target="_blank">Government Disclaimer</a></li>
                <li><a href="<?= Url::toRoute(['site/privacy-policy']); ?>" target="_blank">Privacy Policy</a></li>
                <li><a href="<?= Url::toRoute(['site/terms']); ?>" target="_blank">Terms</a></li>
                <li><a href="<?= Url::toRoute(['site/earnings-disclaimer']); ?>" target="_blank">Earnings Disclaimer</a></li>
                <li><a href="<?= Url::toRoute(['site/spam-policy']); ?>" target="_blank">Spam Policy</a></li>
                <li><a href="mailto: <?= Yii::$app->params['support_email']; ?>">Support</a></li>
            </ul>
        </div><!--
                --><div class="col-md-4 col-xs-12 text-right vcenter copyright">
            &copy; <?= date('Y'); ?> ClickMoney. All Rights Reserved.
        </div>
    </div>
</div>
