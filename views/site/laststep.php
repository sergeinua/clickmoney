<?php
use Mobile_Detect;
use yii\helpers\Url;

use app\assets\LaststepAsset;

/* @var $this yii\web\View */
LaststepAsset::register($this);
Yii::$app->params['bodyClass'] = 'laststep';

$rd = 3;
$gi = 4850;

$mob = new Mobile_Detect();
if ($mob->isTablet() || $mob->isMobile()) {
    $is_mobile = true;
    $gi = 4851;
    $rd = 4;
}

$this->title = '#1 Click Money System';
$controller = '';
if (Yii::$app->controller->id == 'c2m')
    $controller = '/c2m';
$script_init = <<< JS
    var exitsplashmessage = "***************************************\\n W A I T   B E F O R E   Y O U   G O !\\n\\n  CLICK *STAY ON THIS PAGE* BUTTON RIGHT NOW\\n     TO STAY GET THE EXACT METHOD THAT\\n  BANKED ME $35,827.29 IN JUST 24 HOURS!\\n\\n     >> STAY ON THIS PAGE <<\\n\\n***************************************";
    var exitsplashpage = '{$controller}/finaloffer';
    if(top.location != self.location)
    {
        top.location.assign(self.location);
        window.stop();
    }
    var gvars = {'gi': $gi, 'wl': 114, 'rd': $rd, 'sb': 0}
    var forms_modified = false;
    var button = '<div class="row"><div class="col-xs-12 text-center"><button type="submit"><div class="row">';
    button += '<div class="arrow"><img src="/images/svg/unlock-green.svg"></div>';
    button += '<div class="col-md-12 col-xs-9">UNLOCK MY PERSONAL ACCOUNT NOW</div></div></button></div></div>';
    var left_top_arrow = '<div class="col-md-4 hidden-xs hidden-sm mem-first-arrow-left">';
    left_top_arrow += '<img src="/images/arrowleft1.png"></div>';
    var right_top_arrow = '<div class="col-md-4 hidden-xs hidden-sm">';
    right_top_arrow += '<img class="mem-first-arrow-right" src="/images/arrowleft1.png"></div>';
    var left_middle_arrow = '<div class="col-md-4 mem-second-arrow-left hidden-xs hidden-sm">';
    left_middle_arrow += '<img src="/images/arrowLittleGreen.png"></div>';
    var right_middle_arrow = '<div class="col-md-4 mem-second-arrow-right hidden-xs hidden-sm">';
    right_middle_arrow += '<img class="arrow-reversed" src="/images/arrowLittleGreen.png"></div>';
    var left_bottom_arrow = '<div class="col-md-4 mem-third-arrow-left hidden-xs hidden-sm ">';
    left_bottom_arrow += '<img src="/images/arrowleft1.png"></div>';
    var right_bottom_arrow = '<div class="col-md-4 mem-third-arrow-right hidden-xs hidden-sm">';
    right_bottom_arrow += '<img src="/images/arrowleft1.png"></div>';
JS;
$this->registerJs($script_init, yii\web\View::POS_BEGIN);

$script = <<< JS
    $('.membership-footer ul.info li').on('click', function(){
       var item_class = $(this).data('class');
       $('.membership-footer .content div.active').removeClass('active');
       $('.membership-footer .' + item_class).addClass('active');
       $('.membership-footer .' + item_class + ' h3').text($(this).text());
       $('.membership-footer li').removeClass('active');
       $(this).addClass('active');
    });
    $('.panel-default a').on('click', function () {
       if ($(this).attr('aria-expanded') == 'true') {
           $(this).parent().next().remove();
       } else {
           $('.arrow-img').remove();
           $(this).parent().parent().append('<img class="arrow-img-active" src="/images/down.png">');
       }
    });
    $('.panel-default a').hover(
       function () {
           if ($(this).parent().next().hasClass('arrow-img-active') == false) {
               $(this).parent().parent().append('<img class="arrow-img" src="/images/down.png">');
           }
       },
       function () {
           $('.arrow-img').remove();
       }
    );
    $('.membership-header #gaff.gaff form#caffForm').on('submit', function() {
        $('#loading_sec').modal('show');
    });
    $('.last-chace-register #gaff.gaff.middle-form form#caffForm').on('submit', function() {
        $('#loading_sec').modal('show');
    });
    var top_iframe = $('#vim-video-top');
    var top_player = new Vimeo.Player(top_iframe);
    var yellow_arrow = $('img.img-responsive.yellow-arrow');
    var text_label = $('img.img-responsive.yellow-arrow + p');
    top_player.on('play', function() {         
        yellow_arrow.hide();
        text_label.hide();
    });
    $("#gaff, #gaff2").bind("DOMSubtreeModified", function() {
        formModifcation('$fname', '$email');
    });
    $(document).on('submit','form#caffForm',function(){
        if ($('div.popover-content').length == 0) {
            top_player.pause();
            $('#loading_sec').modal('show');
        }
        window.onbeforeunload = null;
    });
JS;
$this->registerJs($script, yii\web\View::POS_READY);
?>

<header class="membership-header">
    <div class="membership-wrapper">
        <div class="container container-header">
            <div class="row container-header-row">
                <p class="col-lg-12 membership-welcome">
                    WAIT! THIS OFFER WILL BE GONE IF YOU LEAVE THE PAGE
                </p>
                <h2 class="membership-biz-area">LAST CHANCE TO CHANGE YOUR LIFE</h2>
                <p class="exit-header-text">
                    Please Watch The <span class="text-dashed">Video
                        Below</span> For Further Instructions
                </p>
                <div class="col-xs-2 col-xs-12 membership-boxIcon">
                    <div class="col-xs-2">
                        <img src="/images/elipsOne.png">
                    </div>
                    <div class="col-xs-11 row membership-right-box">
                        <div class="col-lg-12 membership-licence-left">
                            LICENCE LEFT
                        </div>
                        <div class="col-lg-12 membership-updated">
                            UPDATED <?= strtoupper(date('M d Y')); ?>
                        </div>
                    </div>
                </div>
                <img class="membership-logo" src="/images/ClickMoneyLogo/Logo-yellow.svg">
            </div>
        </div>
        <div class="container left-right-container">
            <div class="row">
                <div class="col-md-7 left_block">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe id="vim-video-top" class="embed-responsive-item" src="https://player.vimeo.com/video/189163312?autoplay=true" width="auto" height="auto"
                                frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                    <img class="img-responsive yellow-arrow" src="/images/yellowArrow1.png">
                    <p>Watch Video Now! Expires in: <span id="time-exit">00h : 05m : 00s</span></p>
                </div>
                <div class="col-md-5 right_block">
                    <h2 class="register-right-text">DON'T MISS YOUR CHANCE<br>
                        <span class="reg-bold">FILL THE FORM BELOW NOW</span>
                    </h2>
                    <div class="gaff" id="gaff"></div>
                    <div class="col-md-11 col-md-offset-2 col-xs-12 membership-block-text">
                        <img class="blockImg" src="/images/svg/lock-white.svg">Guaranteed Secure Access Ensured by Trusted Companies
                    </div>
                    <div class="row text-center icons-block">
                        <div class="col-xs-3 vtop">
                            <a href="#"><img class="m" src=
                                "/images/mcafee.png"></a>
                        </div><!--
                                            -->
                        <div class="col-xs-3 vtop">
                            <a href="#"><img class="t" src=
                                "/images/truste.png"></a>
                        </div><!--
                                            -->
                        <div class="col-xs-3 vtop">
                            <a href="#"><img class="v" src=
                                "/images/red.png"></a>
                        </div><!--
                                            -->
                        <div class="col-xs-3 vtop">
                            <a href="#"><img class="n" src=
                                "/images/norton.png"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<section class="quick-and-easy">
    <div class="container memebership_content">
        <p class="text1"><span class="green">3</span> Quick and Easy
            Steps</p>
        <p class="text">TO START MAKING MONEY</p>
    </div>
</section>
<section class="membership02 register-deposit-profit">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="col-md-4 member-arrows">
                    <img class="first-arrow" src="/images/arrow-3-active.png">
                    <div class="first-num">
                        1
                    </div>
                </div>
                <div class="col-md-8 you-here">
                    <p class="grey">YOU'RE HERE!</p>
                    <p class="green"><span class="num-for-small-res">1</span>Register</p>
                    <p class="green green-little-text">Sign up to the system,
                        choose<br>
                        a username and a password</p>
                </div><img class="hidden-xs hidden-sm arrow arrow1 arrow111 "
                           src="/images/arrowLittleGreen.png"></div>
            <div class="col-md-4">
                <div class="col-md-4 member-arrows">
                    <img class="second-arrow" src="/images/arrow-4.png">
                    <div class="second-num">
                        2
                    </div>
                </div>
                <div class="col-md-8 you-here">
                    <p class="steps-title"><span class="num-for-small-res">2</span>Deposit</p>
                    <p class="grey-small-text">Fund your new account with $250<br>
                        or more to unlock the Click Money System</p>
                </div>
                <img class="hidden-xs hidden-sm arrow arrow1 " src=
                "/images/arrowLittleGreen.png"></div>
            <div class="col-md-4">
                <div class="col-md-4 member-arrows">
                    <img class="third-arrow-add" src="/images/arrow-5.png">
                    <div class="third-num">
                        3
                    </div>
                </div>
                <div class="col-md-8 you-here">
                    <p class="steps-title"><span class="num-for-small-res">3</span>Profit!</p>
                    <p class="grey-small-text">Open a bottle of champagne
                        and<br> watch the money flood your account!</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="last-chace-register">
    <div class="container">
        <div class="row qick-and-easy">
            <div class="border-for-arrow">
                <img class="top-arrow" src="/images/arrow-for-exit.png">
            </div>
            <div class="text-center">
                <p class="grey">THIS OFFER CLOSES IN &nbsp;<span class= "count-down" id="minutes-mem">3m</span><span class="count-down" id="seconds-mem">35s</span></p>
                <p class="register-text"><span class="green">Last chance,</span> Register your</p>
                <p class="register-text">Click Money Account Now</p>
            </div>
            <div class="container">
                <div class="gaff middle-form" id="gaff2"></div>
                <div class="row">
                    <div class= "col-md-12 col-xs-12 membership-block-text">
                        <img class="blockImg" src="/images/svg/lock.svg">Guaranteed Secure Access Ensured by Trusted Companies
                    </div>
                </div>
                <div class="row icons-block text-center">
                    <div class="col-xs-3 vtop">
                        <a href="#"><img class="m" src=
                            "/images/mcafee.png"></a>
                    </div>
                    <div class="col-xs-3 vtop">
                        <a href="#"><img class="t" src=
                            "/images/truste.png"></a>
                    </div>
                    <div class="col-xs-3 vtop">
                        <a href="#"><img class="v" src=
                            "/images/red.png"></a>
                    </div>
                    <div class="col-xs-3 vtop">
                        <a href="#"><img class="n" src=
                            "/images/norton.png"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="membership-footer">
    <div class="container">
        <div class="hidden-sm hidden-xs">
            <div class="row">
                <div class="col-md-5">
                    <h3>FAQ</h3>
                    <ul class="info">
                        <li class="active" data-class="item-1"><a>What is ClickMoney?</a></li>
                        <li data-class="item-2"><a>How much does it cost?</a></li>
                        <li data-class="item-3"><a>What if I already have account?</a></li>
                        <li data-class="item-4"><a>What is the success rate fo ClickMoney?</a></li>
                        <li data-class="item-5"><a>How much money can I earn per day?</a></li>
                        <li data-class="item-6"><a>Do I get support with the Click Money System?</a></li>
                    </ul>
                </div>
                <div class="col-md-7">
                    <div class="content">
                        <div class="item-1 active">
                            <h3>What is ClickMoney?</h3>
                            <p>The Click Money System is a custom coded software that trades on the Binary Options
                                market. It's a unique strategy which traders use to win up to 90% trades. These same
                                strategies have been automated by the Click Money System. Now everyday people with zero
                                experience in making money online can use the system to earn profits within minutes of
                                activation.</p>
                        </div>
                        <div class="item-2">
                            <h3></h3>
                            <p>The cost of the Click Money System is zero, zelch, nada! The software inside the system
                                has no up front cost. In order to unlock the system you must fund your broker account
                                with a minimum of $250 or more. The only way the software works if it has money to trade
                                with to earn profits.</p>
                        </div>
                        <div class="item-3">
                            <h3></h3>
                            <p>ClickMoney software needs to validate your account and its done automatically after
                                you’ve funded your trading account with one of the recommended brokers.</p>
                        </div>
                        <div class="item-4">
                            <h3></h3>
                            <p>The success rate of the Click Money System varies on the end user. Due to the fact we
                                have no control over what you will do with this system once in your hands the typical
                                success rate is not recorded. So for this reason the success rate is solely depended on
                                your commitment to the system. It can be 0-90% depending on the end user. See legal
                                disclaimers in footer links of this page for more information of Click Money Terms Of
                                Service.</p>
                        </div>
                        <div class="item-5">
                            <h3></h3>
                            <p>On average, ClickMoney users make $10,000 per day. Some members make more some make less.
                                The longer the software is on and running, the more money you can make! The best part is
                                ClickMoney does all the work for you. All you need to do is push a few buttons to make on
                                average, $10,000 a day.
                                Disclaimer: If you don’t follow our instructions exactly you could make zero dollars</p>
                        </div>
                        <div class="item-6">
                            <h3></h3>
                            <p>Yes the Click Money System has a very solid support staff. Any questions you have you can
                                contact us any time. Our contact info is on this page. We can be reach by email and
                                skype. You may also contact your broker.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden-lg hidden-md">
            <div class="hidden-lg hidden-md">
                <div id="accordion" class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse"  href="#collapseOne">What is ClickMoney?</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>The Click Money System is a custom coded software that trades on the Binary Options
                                    market. It's a unique strategy which traders use to win up to 90% trades. These same
                                    strategies have been automated by the Click Money System. Now everyday people with
                                    zero experience in making money online can use the system to earn profits within
                                    minutes of activation.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse"  href="#collapseTwo">How much does it cost?</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>The cost of the Click Money System is zero, zelch, nada! The software inside the
                                    system has no up front cost. In order to unlock the system you must fund your broker
                                    account with a minimum of $250 or more. The only way the software works if it has
                                    money to trade with to earn profits.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse"  href="#collapseThree">What if I already have account?</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>ClickMoney software needs to validate your account and its done automatically after
                                    you’ve funded your trading account with one of the recommended brokers.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse"  href="#collapseFour">What is the success rate for ClickMoney?</a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>The success rate of the Click Money System varies on the end user. Due to the fact we
                                    have no control over what you will do with this system once in your hands the
                                    typical success rate is not recorded. So for this reason the success rate is solely
                                    depended on your commitment to the system. It can be 0-90% depending on the end
                                    user. See legal disclaimers in footer links of this page for more information of
                                    Click Money Terms Of Service.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse"  href="#collapseFive">How much money can I earn per day?</a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>On average, ClickMoney users make $10,000 per day. Some members make more some make less.
                                    The longer the software is on and running, the more money you can make! The best part is
                                    ClickMoney does all the work for you. All you need to do is push a few buttons to make on
                                    average, $10,000 a day.
                                    Disclaimer: If you don’t follow our instructions exactly you could make zero dollars</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse"  href="#collapseSix">Do I get support with the Click Money System?</a>
                            </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Yes the Click Money System has a very solid support staff. Any questions you have you
                                    can contact us any time. Our contact info is on this page. We can be reach by email
                                    and skype. You may also contact your broker.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container footer">
        <div class="col-md-4 col-xs-6 copyright">
            <p><?= date('Y'); ?> Clickmoney. All Rights Reserved</p>
        </div>
        <div class="col-md-8 col-xs-6 copyright vcenter menu">
            <ul>
                <li><a href="<?= Url::toRoute(['site/disclaimer']); ?>" target="_blank">Government Disclaimer</a></li>
                <li><a href="<?= Url::toRoute(['site/privacy-policy']); ?>" target="_blank">Privacy Policy</a></li>
                <li><a href="<?= Url::toRoute(['site/terms']); ?>" target="_blank">Terms</a></li>
                <li><a href="<?= Url::toRoute(['site/earnings-disclaimer']); ?>" target="_blank">Earnings Disclaimer</a></li>
                <li><a href="<?= Url::toRoute(['site/spam-policy']); ?>" target="_blank">Spam Policy</a></li>
                <li><a href="mailto: <?= Yii::$app->params['support_email']; ?>">Support</a></li>
            </ul>
        </div>
    </div>
</section>

<?= \Yii::$app->view->renderFile('@app/views/site/popups/thankYou.php'); ?>