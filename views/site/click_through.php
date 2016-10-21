<?php
use  Mobile_Detect;

use yii\helpers\Url;
use app\assets\AppAsset;

$this->registerCssFile(Yii::$app->request->baseUrl.'/web/css/style_click_through.css', ['depends' => [AppAsset::className()]]);

$mob = new Mobile_Detect();
if ($mob->isTablet() || $mob->isMobile()) {
    $is_mobile = true;
}
?>

<div class="image-background clickthrough">
    <div class="bg">
        <div class="container header">
            <div class="row">
                <div class="col-md-7 col-xs-4 logo1">
                    <img class="img-responsive" src="/images/register/logoWhite.png">
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
                    <img class="img-responsive img-left-block1" src="/images/imagineForVideoLarge.jpg">
                    <img class="img-responsive play-button" src="/images/play.png">
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
                    <button type="submit" class="button1 button02" onclick="window.location='/members'">CLICK HERE TO PROCEED<img class="button-arrow" src="/images/arr.png"></button>
                    <div class="button2 col-md-10 col-xs-12"><span class="button20">REMINDER:</span> <span class="orange"><span class="big-number" style="font-size: 14px;">1</span> LICENSE LEFT</span></div>
                </div>
            </div>
        </div>
        <div class="container footer">
            <div class="row">
                <div class="col-md-1 col-xs-2 logWhite"><a href=""><img class="img-responsive" src="/images/register/logoWhiteL.png"></a></div>
                <div class="col-md-7">
                    <ul class="fnavigation">
                        <li><a href="<?= Url::toRoute(['site/disclaimer']); ?>" target="_blank">Government Disclaimer</a></li>
                        <li><a href="<?= Url::toRoute(['site/privacy-policy']); ?>" target="_blank">Privacy Policy</a></li>
                        <li><a href="<?= Url::toRoute(['site/terms']); ?>" target="_blank">Terms</a></li>
                        <li><a href="<?= Url::toRoute(['site/earnings-disclaimer']); ?>" target="_blank">Earnings Disclaimer</a></li>
                        <li><a href="<?= Url::toRoute(['site/spam-policy']); ?>" target="_blank">Spam Policy</a></li>
                        <li><a href="mailto: <?= Yii::$app->params['support_email']; ?>">Support</a></li>
                    </ul>
                </div>
                <div class="col-md-4 copyright1">
                    <span class="copyright">© 2016 ClickMoney. All Rights Reserved.</span>
                </div>
            </div>
        </div>
    </div>
</div>
