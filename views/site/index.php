<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;

/* @var $this yii\web\View */

$this->registerCssFile(Yii::$app->request->baseUrl.'/web/css/fe1.css', ['depends' => [BootstrapAsset::className()]]);
$this->registerCssFile(Yii::$app->request->baseUrl.'/web/css/exit-popup.css', ['depends' => [BootstrapAsset::className()]]);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Montserrat');
$this->registerCssFile('https://fonts.googleapis.com/css?family=Open+Sans');
$this->registerJsFile(Yii::$app->request->baseUrl.'/web/js/jquery.animateNumber.min.js', ['depends' => [JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/web/js/counter.js', ['depends' => [JqueryAsset::className()]]);

$script_init = <<< JS
    var exitsplashmessage = "***************************************\\n W A I T   B E F O R E   Y O U   G O !\\n\\n  CLICK *STAY ON THIS PAGE* BUTTON RIGHT NOW\\n     TO STAY GET THE EXACT METHOD THAT\\n  BANKED ME $35,827.29 IN JUST 24 HOURS!\\n\\n     >> STAY ON THIS PAGE <<\\n\\n***************************************";
    var exitsplashpage = '/freereport';
JS;
$this->registerJs($script_init, yii\web\View::POS_BEGIN);

$script = <<< JS
(function($) {
    $('body').addClass('fe1');

    $(".join-popup .close-btn a").click(function(e){
        $(".join-popup").removeClass('showed');
        sessionStorage.setItem('show_joined_popup', 'false');
        return false;
    });
})(jQuery);
JS;
$this->registerJs($script, yii\web\View::POS_READY);

$this->title = 'Front End 1 page';
?>

    <div class="image-background">
        <div class="container content">
            <div class="row">
                <div class="col-xs-12 video-through vcenter text-center">
                    <img class="img-responsive" src="/images/fe-1-video.jpg" />
                    <img class="play" src="/images/play.png" />
                    <img class="play_gd" src="/images/gd_corner_fe1.png" />
                    <img class="play_logo" src="/images/ClickMoneyLogo/Logo-green.svg" />
                </div>
            </div>
            <div class="row background-white main-block">
                <div class="col-xs-12">
                    <div class="row text-uppercase text-center">
                        <div class="col-xs-12">
                            <span class="main-text">
                                <span class="limited-spots">LIMITED SPOTS</span>
                                Enter your <u><strong>first name</strong></u> and <u><strong>best email address</strong></u>
                                below to proceed
                            </span>
                        </div>
                    </div>
                    <div class="row action-form">
                        <form method="post" id="main-form" action="javascript:;">
                            <div class="col-md-6 col-xs-12  text-center">
                                <div class="form-fields">
                                    <label for="name">My name’s</label>
                                    <input name="name" id="name" type="text" placeholder="John" pattern="^(?=.{3,15}$)[a-zA-Z][a-zA-Z][\u0600-\u06FF]*$*\s?[a-zA-Z][\u0600-\u06FF]*$+$" required title="Please enter 3-15 characters (alphabets only)"/>
                                    <label for="email">and my best email is</label>
                                    <input name="email" id="email" type="email" placeholder="john@example.com" required title="Please enter your email here"/>
                                </div>
                            </div><!--
                            --><div class="col-md-4 col-xs-12 text-center">
                                <button type="submit">
                                    <div class="row">
                                        <div class="col-md-11 col-xs-9">
                                            OPEN MY CLICKMONEY ACCOUNT
                                        </div>
                                        <div class="arrow">
                                            <img src="/images/arrow-fe-1.png" />
                                        </div>
                                    </div>
                                </button>
                                <div class="warranty-text"><img src="/images/block.png" /> <span>Guaranteed Secure Access Ensured by Trusted Companies</span></div>
                            </div>
                        </form><!--
                            --><div class="col-md-2 col-xs-12 icons-block">
                            <div class="row">
                                <div class="col-md-4 col-xs-3">
                                    <a href="#"><img class="m" src="/images/m-seal.png"></a>
                                </div><!--
                                    --><div class="col-md-8 col-xs-3">
                                    <a href="#"><img class="t" src="/images/t-seal.jpg"></a>
                                </div><!--
                                    --><div class="col-md-4 col-xs-3">
                                    <a href="#"><img class="v" src="/images/v-seal.png"></a>
                                </div><!--
                                    --><div class="col-md-8 col-xs-3">
                                    <a href="#"><img class="n" src="/images/n-seal.png"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid footer">
                <div class="row">
                    <div class="col-xs-12 col-md-1 vcenter logo">
                        <a href=""><img src="/images/ClickMoneyLogo/Logo-gray.svg"></a>
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
        </div>
    </div>
    <!-- Just joined popup -->
    <div class="join-popup">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-2">
                    <img src="/images/smile.png">
                </div>
                <div class="col-xs-10">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="green-lighter-text">John</span> has just joined ClickMoney!
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <span class="time-text">4 minutes ago</span>
                            <span class="email-text">john***@gmail.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="close-btn"><a href="#"><img src="/images/ex.png"></a></div>
    </div>

<?php
if ($esp_forms) {
    $i = 0;
    foreach ($esp_forms as $key => $value) {
        echo \Yii::$app->view->renderFile('@app/views/site/forms/form_' . $key . '.php', ['item' => $i + 1, 'params' => $value]);
        $i++;
    }
}
if ($esp_forms_exit) {
    $i = 0;
    foreach ($esp_forms_exit as $key => $value) {
        echo \Yii::$app->view->renderFile('@app/views/site/forms/form_' . $key . '.php', ['item' => ($i + 1).'_exit', 'params' => $value]);
        $i++;
    }
} ?>

<?php Modal::begin(['id' => 'exitpopup']); ?>

    <div class="row">
        <div class="container header col-lg-10 col-lg-offset-1">
            <div class="row">
                <div class="col-md-2 col-xs-6 logo col-sm-3">
                    <img src="/images/ClickMoneyLogo/Logo-white.svg">
                </div>
                <div class="col-md-2 col-xs-6 lic text-right vcenter col-sm-3 pull-right">
                    <span class="licenceLeft">1</span><span class="licenceRight">Report Left</span>
                </div>
                <div class="col-xs-12 col-md-8 col-sm-6 text-white row">
                    <div class="col-lg-2 col-md-12">
                        <img src="images/nn.png">There are currently
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <span class="feExitRed" id="people_filling_nd_spot">416</span> People On This Very Page Right Now.
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <span class="feExitRed" id="try_to_take_spot">104</span> of Them Trying To Take <span class="feExitBold">Your Report</span> Right Now. <span class="feExitBold">Act Quickly!</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="container content">
            <div class="row close-btn-block">
                <div class="col-md-11 col-xs-10 close-btn-text">
                    Click here To Close Sign Up Form
                </div>
                <div class="col-md-1">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12 vtop right_block">
                    <div class="row text-center">
                        <div class="col-xs-12">
                            <span class="main-text">
                                <h2 class="clickbtFE2 feExitWar0"><span class="feExitWar">WARNING:</span> Download Your <span class="bold-text">Free ClickMoney Report</span> Before This Exclusive Offer Expires!</h2>
                            </span>
                        </div>
                        <div class="col-xs-12">
                            <p class="notifExit" >Enter your first name and best email address below to proceed:</p>
                        </div>
                    </div><!--
                    --><div class="row action-form">
                        <div class="col-xs-12">
                            <form method="post" action="">
                                <div class="form-fields col-md-10 col-md-offset-1">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-5 vcenter nameFE20">
                                            <label for="name">My name's</label>
                                        </div><!--
                                    --><div class="col-xs-12 col-sm-7 vcenter nameFE2 nameExit">
                                            <input type="text" id="name" name="name" pattern="^(?=.{3,15}$)[a-zA-Z][a-zA-Z][\u0600-\u06FF]*$*\s?[a-zA-Z][\u0600-\u06FF]*$+$" value required placeholder="Enter your name here" title="Please enter 3-15 characters (alphabets only)">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-5 vcenter">
                                            <label for="email">My best email is</label>
                                        </div><!--
                                    --><div class="col-xs-12 col-sm-7 vcenter email">
                                            <input type="email" id="email" name="email" required placeholder="Enter your email here">
                                        </div>
                                    </div>
                                </div>
                                <img class="main-arrow" src="/images/arfe3.png">
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <button type="submit" id="exit-send-btn">
                                            <div class="col-md-12 col-xs-12 proceed btnFE2 btnFE3">
                                                <span>FAST! CLICK HERE TO GET THE REPORT</span>
                                            </div>
                                        </button>
                                        <div class="warranty-text col-xs-10 col-xs-offset-1"><img class="blockImg" src="/images/block.png" />
                                            <span>The Last Spot Is Still Here. Grab it Before Someone Else Does!</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-10 col-xs-10 col-xs-offset-1 exitDown">
                            <span>HURRY!</span> Download Link Expires in: <span id="time-exit">00h : 03m : 27s</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
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
    </div>

<?php Modal::end(); ?>

<?= \Yii::$app->view->renderFile('@app/views/site/thank_you.php'); ?>
