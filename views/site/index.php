<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\bootstrap\BootstrapAsset;

/* @var $this yii\web\View */

$this->registerCssFile(Yii::$app->request->baseUrl.'/web/css/fe1.css', ['depends' => [BootstrapAsset::className()]]);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Montserrat');
$this->registerCssFile('https://fonts.googleapis.com/css?family=Open+Sans');

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
    
    // if (top.location != self.location)
    // {
    //     top.location.replace(self.location);
    //     window.stop();
    // }

    /* #vid_hl old logic */
    // var hl_index = test_index = 0;
    // var total_time_passed = 0
    // var hl_arr = [33,53,78,52,73,182,38,841,153,293,49,19];
    //
    // var hl_text = [];
    // hl_text[0] = "This Is The First And Only Time We Are Allowing The General Public To Get Free Access.";
    // hl_text[1] = "Time Is Limited And There’s A lot Of Money At Stake. Please Turn Off All Distractions And Get Ready To Go On An Exciting Trip With Us.";
    // hl_text[2] = "After Watching This Video Until The End You Will Feel Like You Won The Lottery And The Amount Of Money You Won Is Unlimited For Life!";
    // hl_text[3] = "";
    // hl_text[4] = "";
    // hl_text[5] = "You Just Landed On The One Page That Has A Secret Back Door To A Multi-Billion Dollar Market.";
    // hl_text[6] = "";
    // hl_text[7] = "";
    // hl_text[8] = "Please Put Your Best Email In The Form Below To Proceed To The Next Step";
    // hl_text[9] = "";
    // hl_text[10] = "";
    // hl_text[11] = "Enter Your Best Email And Click The ​Button​ On This Page. Your Money Is Waiting For You!";
    //
    // function updateHL()
    // {
    //     if(hl_index < 13)
    //     {
    //         if(hl_text[hl_index-1]!='')
    //         {
    //             $("#vid_hl").html(hl_text[hl_index-1]);
    //         }
    //         setTimeout(function(){updateHL();}, (hl_arr[hl_index++]*1000));
    //
    //         total_time_passed = total_time_passed + hl_arr[test_index++];
    //         if(total_time_passed > 59)
    //         {
    //             min = total_time_passed /60;
    //             sec = total_time_passed %60;
    //         }
    //     }
    // }
})(jQuery);
JS;
$this->registerJs($script, yii\web\View::POS_READY);

$this->title = 'Front End 1 page';
?>

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
    Exit Under Construction
<?php Modal::end(); ?>

<?= \Yii::$app->view->renderFile('@app/views/site/thank_you.php'); ?>
