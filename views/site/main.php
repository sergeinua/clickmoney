<?php
use Mobile_Detect;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use app\assets\MainAsset;

MainAsset::register($this);

/* @var $this yii\web\View */
Yii::$app->params['bodyClass'] = 'fe2';

/* adding redirect for the C2mController and C3mController */
$cm_redirect = false;
/* redirect is not needed for site controller */
if (Yii::$app->controller->id != 'site')
    $cm_redirect = Yii::$app->controller->id;
/* exitsplash page */
$freereport_page = "/freereport";
/* setting correct controller */
if ($cm_redirect)
    $freereport_page = "/$cm_redirect" . $freereport_page;

$script_init = <<< JS
    var exitsplashmessage = "***************************************\\n W A I T   B E F O R E   Y O U   G O !\\n\\n  CLICK *STAY ON THIS PAGE* BUTTON RIGHT NOW\\n     TO STAY GET THE EXACT METHOD THAT\\n  BANKED ME $35,827.29 IN JUST 24 HOURS!\\n\\n     >> STAY ON THIS PAGE <<\\n\\n***************************************";
    var exitsplashpage = '$freereport_page';
    sessionStorage.setItem('show_exit_popup', 'true');
JS;
if ($exitSplAndPopup) {
    $this->registerJs($script_init, yii\web\View::POS_BEGIN);
}

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

$this->title = '#1 Click Money System';


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
    <?php if ($cm_redirect) : ?>
        var cm_redirect = '<?= $cm_redirect; ?>';
    <?php else : ?>
        var cm_redirect = false;
    <?php endif; ?>
</script>

<div class="container header">
    <div class="row">
        <div class="col-xs-6 logo vcenter">
            <img src="/images/ClickMoneyLogo/Logo-white.svg">
        </div><!--
                --><div class="col-xs-6 lic text-right vcenter">
            <span class="licenceLeft"><span class="licenceRight">LIMITED SPOTS</span></span>
        </div>
    </div>
</div>
<div class="container content">
    <div class="row">
        <div class="col-md-7 col-xs-12 text-center left_block">
            <img class="corner-rectangle-sm hidden-md hidden-lg" src="/images/rectangle.png">
            <p class="corner-rectangle-text-sm hidden-md hidden-lg">LIMITED<br> SPOTS</p>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe id="vim-video"
                        src="https://player.vimeo.com/video/189163304?autoplay=true"
                        frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-5 col-xs-12 right_block">
            <img class="corner-rectangle-md hidden-xs hidden-sm" src="/images/rectangle.png">
            <p class="corner-rectangle-text-md hidden-xs hidden-sm">LIMITED<br> SPOTS</p>
            <div class="container-fluid">
                <div class="row text-uppercase text-center">
                    <div class="col-xs-12">
                        <span class="main-text">
                            <span class="limited-spots hidden">LIMITED SPOTS</span>
                            <p>Enter your <u><strong>first name</strong></u> and <u><strong>best email address</strong></u>
                            below to proceed</p>
                        </span>
                    </div>
                </div>
                <div class="row action-form">
                    <div class="col-xs-12">
                        <img class="main-arrow" src="/images/arfe2.png">
                        <form method="post" action="javascript:;" id="fe-2-form">
                            <div class="form-fields">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="name">My name's</label>
                                    </div><!--
                                    --><div class="col-xs-12">
                                        <input type="text" id="name" name="name" pattern="^(?=.{3,15}$)[a-zA-Z][a-zA-Z][\u0600-\u06FF]*$*\s?[a-zA-Z][\u0600-\u06FF]*$+$" value required placeholder="Enter your name here" title="Please enter 3-15 characters (alphabets only)">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="email">My best email is</label>
                                    </div><!--
                                    --><div class="col-xs-12">
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
                                                <img src="/images/arrow-fe-1.png" />
                                            </div>
                                        </div>
                                    </button>
                                    <div class="warranty-text"><img class="blockImg" src="/images/svg/lock.svg" /> <span>Guaranteed Secure Access Ensured by Trusted Companies</span></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row icons-block text-center">
                    <div class="col-xs-3 vtop">
                        <a href="#"><img class="m" src="/images/m-seal.png"></a>
                    </div><!--
                    --><div class="col-xs-3 vtop">
                        <a href="#"><img class="t" src="/images/t-seal.jpg"></a>
                    </div><!--
                    --><div class="col-xs-3 vtop">
                        <a href="#"><img class="v" src="/images/v-seal.png"></a>
                    </div><!--
                    --><div class="col-xs-3 vtop">
                        <a href="#"><img class="n" src="/images/n-seal.png"></a>
                    </div>
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

<!-- Just joined popup -->
<div class="join-popup">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-3">
                <img src="/images/smile.png">
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
    <div class="close-btn"><a href="#"><img src="/images/svg/circle_delete.svg"></a></div>
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

<?= \Yii::$app->view->renderFile('@app/views/site/popups/exit.php'); ?>

<?= \Yii::$app->view->renderFile('@app/views/site/popups/thankYou.php'); ?>
