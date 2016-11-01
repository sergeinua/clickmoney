<?php
use Mobile_Detect;

use yii\helpers\Url;
use yii\bootstrap\Modal;
use app\assets\Main2Asset;

Main2Asset::register($this);

/* @var $this yii\web\View */
Yii::$app->params['bodyClass'] = 'main2';

$script_init = <<< JS
    var exitsplashmessage = "***************************************\\n W A I T   B E F O R E   Y O U   G O !\\n\\n  CLICK *STAY ON THIS PAGE* BUTTON RIGHT NOW\\n     TO STAY GET THE EXACT METHOD THAT\\n  BANKED ME $35,827.29 IN JUST 24 HOURS!\\n\\n     >> STAY ON THIS PAGE <<\\n\\n***************************************";
    var exitsplashpage = '/freereport';
    sessionStorage.setItem('show_exit_popup', 'true');
JS;
//$this->registerJs($script_init, yii\web\View::POS_BEGIN);

$script = <<< JS
(function($) {
    $(".join-popup .close-btn a").click(function(e){
        $(".join-popup").removeClass('showed');
        sessionStorage.setItem('show_joined_popup', 'false');
        return false;
    });
    var iframe = $('#vim-video');
    var player = new Vimeo.Player(iframe);
})(jQuery);
JS;
$this->registerJs($script, yii\web\View::POS_READY);

$this->title = 'ClickMoney.com';

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

<!--<div class="fixed-top top-info-block">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-xs-4 col-md-2 logo">-->
<!--                <img src="images/ClickMoneyLogo/Logo-white.svg">-->
<!--            </div>-->
<!--            <div class="col-xs-8 col-md-2 pull-right reports-left-block row">-->
<!--                <div class="col-xs-8">-->
<!--                    <span class="reports-left-text">Reports Left</span>-->
<!--                    <p class="hidden-xs">Updated OCT 24 2106</p>-->
<!--                </div>-->
<!--                <div class="col-xs-4 quantity-block">-->
<!--                    <span class="quantity">10</span>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-xs-12 col-md-8 text-white row">-->
<!--                <div class="col-xs-12">-->
<!--                    <img src="images/alert.png" width="26px">There are currently-->
<!--                </div>-->
<!--                <div class="col-xs-12">-->
<!--                    <span class="filling-text-red" id="people_filling_nd_spot">416</span> People On This Very Page Right Now.<br>-->
<!--                </div>-->
<!--                <div class="col-xs-12">-->
<!--                    <span class="filling-text-red" id="try_to_take_spot">104</span> of Them Trying To Take <span-->
<!--                        class="feExitBold">Your Spot</span> Right Now. <span class="feExitBold">Act Quickly!</span>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<div class="container header">
    <div class="row">
        <div class="col-xs-4 logo vcenter">
            <img src="images/ClickMoneyLogo/Logo-white.svg">
        </div>
        <div class="col-xs-8 lic text-right vcenter">
            <span class="licenceLeft"><span>10</span><span class="licenceRight">Spots Left</span></span>
        </div>
    </div>
</div>
<div class="container content">
    <img class="corner-rectangle" src="images/elemets/rectangle.png">
    <div class="row">
        <div class="col-xs-12 video">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe id="vim-video" class="embed-responsive-item"
                        src="https://player.vimeo.com/video/189163304?autoplay=true"
                        width="auto" height="auto" frameborder="0"
                        webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-title to-uppercase">
                        <p>Enter Your <span class="text-bold">FIRST NAME</span> and <span class="text-bold">BEST EMAIL ADDRESS</span> below to proceed</p>
                    </div>
                </div>
                <div class="col-xs-12">
                    <form method="post" action="javascript:;" id="fe-2-form">
                        <div class="form-fields">
                            <div class="row">
                                <div class="col-xs-12 col-md-3">
                                    <label for="name">My name's</label>
                                    <input type="text" id="name" name="name" pattern="^(?=.{3,15}$)[a-zA-Z][a-zA-Z][\u0600-\u06FF]*$*\s?[a-zA-Z][\u0600-\u06FF]*$+$" value required placeholder="Enter your name here" title="Please enter 3-15 characters (alphabets only)">
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <label for="email">My best email is</label>
                                    <input type="email" id="email" name="email" required placeholder="Enter your email here">
                                </div>
                                <div class="col-xs-12 col-md-4 text-center">
                                    <button type="submit">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                OPEN MY CLICK MONEY ACCOUNT
                                            </div>
                                        </div>
                                    </button>
                                    <div class="lock-text">
                                        <img class="lock-img" src="images/svg/lock.svg" />
                                        <span>Guaranteed Secure Access Ensured by Trusted Companies</span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-2">
                                    <div class="row">
                                        <div class="row icons-block text-center">
                                            <div class="col-xs-3 col-md-6 vtop">
                                                <a href="#"><img class="m" src="images/m-seal.png"></a>
                                            </div>
                                            <div class="col-xs-3 col-md-6 vtop">
                                                <a href="#"><img class="t" src="images/t-seal.jpg"></a>
                                            </div>
                                            <div class="col-xs-3 col-md-6 vtop">
                                                <a href="#"><img class="v" src="images/v-seal.png"></a>
                                            </div>
                                            <div class="col-xs-3 col-md-6 vtop">
                                                <a href="#"><img class="n" src="images/n-seal.png"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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







<!-- Just joined popup -->
<!--<div class="join-popup">-->
<!--    <div class="container-fluid">-->
<!--        <div class="row">-->
<!--            <div class="col-xs-2">-->
<!--                <img src="/images/smile.png">-->
<!--            </div>-->
<!--            <div class="col-xs-10">-->
<!--                <div class="row">-->
<!--                    <div class="col-md-12">-->
<!--                        <span class="green-lighter-text">John</span> has just joined ClickMoney!-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row">-->
<!--                    <div class="col-md-12">-->
<!--                        <span class="time-text">4 minutes ago</span>-->
<!--                        <span class="email-text">john***@gmail.com</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="close-btn"><a href="#"><img src="/images/svg/circle_delete.svg"></a></div>-->
<!--</div>-->

<?php
//foreach ($forms as $form) {
//    $i = 0;
//    foreach ($form['forms'] as $key => $value) {
//        echo \Yii::$app->view->renderFile('@app/views/site/forms/form_' . $key . '.php', ['item' => ($i + 1) . (empty($form['prefix']) ? '' : '_' . $form['prefix']), 'params' => $value]);
//        $i++;
//    }
//}
?>

<?= \Yii::$app->view->renderFile('@app/views/site/popups/exit.php'); ?>

<?= \Yii::$app->view->renderFile('@app/views/site/popups/thankYou.php'); ?>
