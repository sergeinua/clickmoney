<?php
use Mobile_Detect;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use app\assets\MainAsset;

MainAsset::register($this);

/* @var $this yii\web\View */
Yii::$app->params['bodyClass'] = 'fe2';

$script_init = <<< JS
    var exitsplashmessage = "***************************************\\n W A I T   B E F O R E   Y O U   G O !\\n\\n  CLICK *STAY ON THIS PAGE* BUTTON RIGHT NOW\\n     TO STAY GET THE EXACT METHOD THAT\\n  BANKED ME $35,827.29 IN JUST 24 HOURS!\\n\\n     >> STAY ON THIS PAGE <<\\n\\n***************************************";
    var exitsplashpage = '/freereport';
JS;
$this->registerJs($script_init, yii\web\View::POS_BEGIN);

$script = <<< JS
(function($) {
    $(".join-popup .close-btn a").click(function(e){
        $(".join-popup").removeClass('showed');
        sessionStorage.setItem('show_joined_popup', 'false');
        return false;
    });
})(jQuery);
JS;
$this->registerJs($script, yii\web\View::POS_READY);

$this->title = 'Front End 2 page';


$mob = new Mobile_Detect();
if ($mob->isTablet() || $mob->isMobile()) {
    $from_page = 'mobile';
    $is_mobile = true;
}
?>
<script>
    <?php if (isset($from_page)) : ?>
    var from_page = '<?= $from_page; ?>';
    <?php endif; ?>
</script>



<div class="image-background">
    <div class="bg">
        <div class="container header">
            <div class="row">
                <div class="col-xs-6 logo vcenter">
                    <img src="images/ClickMoneyLogo/Logo-white.svg">
                </div><!--
                --><div class="col-xs-6 lic text-right vcenter">
                    <span class="licenceLeft">10</span><span class="licenceRight">Spots Left</span>
                </div>
            </div>
        </div>
        <div class="container content">
            <div class="row">
                <div class="col-md-7 col-xs-12 video-through vcenter text-center left_block">
                    <img class="img-responsive" src="images/imagineForVideoLarge.jpg">
                    <img class="play" src="images/play.png" />
                    <!--<img class="play_gd" src="images/gd_corner_fe1.png" />-->
                    <!--<img class="play_logo" src="images/ClickMoneyLogo/Logo-green.svg" />-->
                </div><!--
                --><div class="col-md-5 col-xs-12 vtop right_block">
                    <div class="row text-uppercase text-center">
                        <div class="col-xs-12">
                            <span class="main-text">
                                <span class="limited-spots">LIMITED SPOTS</span>
                                <p>Enter your <u><strong>first name</strong></u> and <u><strong>best email address</strong></u>
                                below to proceed</p>
                            </span>
                        </div>
                    </div><!--
                    --><div class="row action-form">
                        <div class="col-xs-12">
                            <img class="main-arrow" src="images/arfe2.png">
                            <form method="post" action="javascript:;" id="fe-2-form">
                                <div class="form-fields">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 vcenter">
                                            <label for="name">My name's</label>
                                        </div><!--
                                    --><div class="col-xs-12 col-sm-8 vcenter">
                                            <input type="text" id="name" name="name" pattern="^(?=.{3,15}$)[a-zA-Z][a-zA-Z][\u0600-\u06FF]*$*\s?[a-zA-Z][\u0600-\u06FF]*$+$" value required placeholder="Enter your name here" title="Please enter 3-15 characters (alphabets only)">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 vcenter">
                                            <label for="email">My best email is</label>
                                        </div><!--
                                    --><div class="col-xs-12 col-sm-8 vcenter">
                                            <input type="email" id="email" name="email" required placeholder="Enter your email here">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <button type="submit">
                                            <div class="row">
                                                <div class="col-md-11 col-xs-9">
                                                    OPEN MY CLICKMONEY ACCOUNT
                                                </div>
                                                <div class="arrow">
                                                    <img src="images/arrow-fe-1.png" />
                                                </div>
                                            </div>
                                        </button>
                                        <div class="warranty-text"><img class="blockImg" src="images/block.png" /> <span>Guaranteed Secure Access Ensured by Trusted Companies</span></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!--
                    --><div class="row icons-block text-center">
                        <div class="col-xs-3 vtop">
                            <a href="#"><img class="m" src="images/m-seal.png"></a>
                        </div><!--
                        --><div class="col-xs-3 vtop">
                            <a href="#"><img class="t" src="images/t-seal.jpg"></a>
                        </div><!--
                        --><div class="col-xs-3 vtop">
                            <a href="#"><img class="v" src="images/v-seal.png"></a>
                        </div><!--
                        --><div class="col-xs-3 vtop">
                            <a href="#"><img class="n" src="images/n-seal.png"></a>
                        </div>
                    </div>
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
    </div>
</div>
<!-- Just joined popup -->
<div class="join-popup">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-3">
                <img src="images/smile.png">
            </div>
            <div class="col-xs-9">
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
    <div class="close-btn"><a href="#"><img src="images/ex.png"></a></div>
</div>
<?php
foreach ($forms as $form) {
    $i = 0;
    foreach ($form['forms'] as $key => $value) {
        echo \Yii::$app->view->renderFile('@app/views/site/forms/form_' . $key . '.php', ['item' => ($i + 1) . (empty($form['prefix']) ? '' : '_' . $form['prefix']), 'params' => $value]);
        $i++;
    }
}
?>

<?php
$oheader = <<<HEA
        <div class="row close-btn-block">
            <div class="col-md-5 col-xs-8 col-sm-6 vcenter">
                <span class="licenceLeft">1</span><span class="licenceRight">Report Left</span>
            </div><!--
            --><div class="col-md-6 close-btn-text hidden-xs hidden-sm vcenter">
                <a href="javascript:void(0);" data-dismiss="modal" aria-hidden="true">Click here To Close Sign Up Form</a>
            </div><!--
            --><div class="col-md-1 col-xs-4 col-sm-6 vcenter">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
        </div>
HEA;

Modal::begin([
    'id' => 'exitpopup',
    'closeButton' => false,
    'header' => $oheader
]); ?>

    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-xs-12">
                <span class="main-text">
                    <strong class="clickbtFE2 feExitWar0"><span class="feExitWar">WARNING:</span> Download Your <span class="bold-text">Free ClickMoney Report</span> Before This Exclusive Offer Expires!</strong>
                </span>
                <p class="notifExit" >Enter your first name and best email address below to proceed:</p>
            </div>
        </div><!--
                --><div class="row action-form">
            <div class="col-xs-12">
                <form method="post" action="javascript:;" id="exit-popup-form">
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
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 block-current-people text-center">
                <img src="images/orangeStop.png">There are currently
                <span class="feExitRed" id="people_filling_nd_spot">416</span> People On This Very Page Right Now.
                <span class="feExitRed" id="try_to_take_spot">104</span> of Them Trying To Take <span class="feExitBold">Your Report</span> Right Now. <span class="feExitBold">Act Quickly!</span>
            </div>
        </div>
    </div>

<?php Modal::end(); ?>

<?= \Yii::$app->view->renderFile('@app/views/site/thank_you.php'); ?>
