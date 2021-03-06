<?php
use  Mobile_Detect;

use yii\helpers\Url;
use app\assets\ClickthroughtAsset;

ClickthroughtAsset::register($this);

Yii::$app->params['bodyClass'] = 'fe2 clickthrough';

/* adding redirect for the C2mController and C3mController */
$cm_redirect = false;
/* redirect is not needed for site controller */
if (Yii::$app->controller->id != 'site')
    $cm_redirect = Yii::$app->controller->id;
/* exitsplash page */
$exitsplash_page = "/approved";
/* setting correct controller */
if ($cm_redirect)
    $exitsplash_page = "/$cm_redirect" . $exitsplash_page;

$script_init = <<< JS
    var exitsplashmessage = "***************************************\\n W A I T   B E F O R E   Y O U   G O !\\n\\n  CLICK *STAY ON THIS PAGE* BUTTON RIGHT NOW\\n     TO STAY GET THE EXACT METHOD THAT\\n  BANKED ME $35,827.29 IN JUST 24 HOURS!\\n\\n     >> STAY ON THIS PAGE <<\\n\\n***************************************";
    var exitsplashpage = '$exitsplash_page';
JS;
if ($exitSplAndPopup) {
    $this->registerJs($script_init, yii\web\View::POS_BEGIN);
}

$mob = new Mobile_Detect();
if ($mob->isTablet() || $mob->isMobile()) {
    $is_mobile = true;
}

$this->title = '#1 Click Money System';
?>

<div class="container header">
    <div class="row">
        <div class="col-xs-6 logo vcenter">
            <img src="/images/ClickMoneyLogo/Logo-white.svg">
    </div><!--
    --><div class="col-xs-6 lic text-right vcenter">
            <span class="licenceLeft"><span>10</span><span class="licenceRight">Licence Left</span></span>
        </div>
    </div>
</div>
<div class="container content">
    <div class="row">
        <div class="col-md-7 col-xs-12 video-through text-center left_block">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item"
                        src="https://player.vimeo.com/video/189163302?autoplay=true" width="auto"
                        height="auto" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
        </div><!--
        --><div class="col-md-5 col-xs-12 right_block">
            <div class="container-fluid">
                <div class="row text-uppercase text-center main-text">
                    <div class="col-xs-12">
                        <span class="welcome-plate">WELCOME ABOARD!</span>
                        <p class="welcome-text">
                            <u><strong>Click The Button Below</strong></u>
                            <br class="hidden-sm hidden-xs" />
                            To <u><strong>Secure </strong><span class="orange">1</span><strong> of the</strong> <span class="orange">10</span></u>
                            CLICK MONEY LICENSES
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="stop container-fluid">
                            <div class="row">
                                <img src="/images/arrow-for-throu.png" class="arr-left">
                                <div class="col-md-3 col-xs-4 vcenter">
                                    <img src="/images/stopRed.png" class="img-responsive img_stop">
                                </div><!--
                                --><div class="col-md-9 col-xs-8 vcenter do-not-exit">
                                    <p class="warning orange">Please <span class="red">DO NOT</span> Exit This Page!</p>
                                    <p class="description">Or your spot will be given to the next person in line waiting to watch this video.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row action-form">
                    <div class="col-xs-12 text-center">
                        <button type="submit" onclick="window.onbeforeunload = null; window.location='<?= $exitsplash_page; ?>'">
                            <div class="row">
                                <div class="col-sm-11 col-xs-10">
                                    CLICK HERE TO PROCEED
                                </div>
                                <div class="arrow">
                                    <img src="/images/arrow-fe-1.png" />
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12 text-center reminder">REMINDER: <span class="orange"><span class="big-number">10</span> LICENSE LEFT</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container footer">
    <div class="row">
        <div class="col-xs-12 col-md-1 vcenter logo">
            <a href=""><img src="/images/ClickMoneyLogo/Logo-white.svg"></a>
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

