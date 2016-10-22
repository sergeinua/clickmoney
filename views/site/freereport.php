<?php
use Mobile_Detect;

use yii\helpers\Url;
use app\assets\ExitAsset;

ExitAsset::register($this);

Yii::$app->params['bodyClass'] = 'fe2 freereport';

$this->title = 'ClickMoney.com';

$mob = new Mobile_Detect();
if ($mob->isTablet() || $mob->isMobile()) {
    $from_page = 'mobile';
    $is_mobile = true;
}
if (isset($from_page)) {
$script_init = <<< JS
    var from_page = '$from_page';
JS;
    $this->registerJs($script_init, yii\web\View::POS_BEGIN);
}
$script_init = <<< JS
    if(top.location != self.location)
    {
        top.location.assign(self.location);
        window.stop();
    }
JS;
$this->registerJs($script_init, yii\web\View::POS_BEGIN);

$script = <<< JS
(function ($) {
    function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);
    
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;
    
            display.text("00h : " + minutes + "m : " + seconds + "s");
    
            if (--timer < 0) {
                timer = duration;
            }
        }, 1000);
    }

   function changeFSize()
    {
        var fsize = (parseInt($("#people_filling").css('font-size')) - 2);
        $("#people_filling").css('font-size', fsize+'px');
    }
    function randomIntFromInterval(min,max)
    {
        return Math.floor(Math.random()*(max-min+1)+min);
        //return rndsc = (Math.random()*(max-min+1)+min);
        //return rndsc.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }

    
    
    var prev_val = randomIntFromInterval(100,200);
    $("#people_filling_nd_spot").html(prev_val);
    $("#try_to_take_spot").html(Math.floor(prev_val/4));
    var changefs = 0;
    var how_many_times_increase = 0;
    function doSomething()
    {
        var z = randomIntFromInterval(5,15);

        var incre_decre = randomIntFromInterval(0,1);
        if(how_many_times_increase < 3 && incre_decre == 0)
            incre_decre = 1;

        if(incre_decre == 0 && (prev_val - z) < 10) //to control negative values
            incre_decre = 1;

        if(incre_decre > 0) //increase the value
        {
            $('#people_filling_nd_spot')
                .prop('number', prev_val)
                .animateNumber(
                    {
                        number: (prev_val + z)
                    },
                    1000
                );
            $('#try_to_take_spot')
                .prop('number', Math.floor(prev_val/4))
                .animateNumber(
                    {
                        number: (Math.floor((prev_val + z)/4))
                    },
                    1000
                );
            prev_val = prev_val + z;
            how_many_times_increase++;
        }
        else
        {
            //decrease the value
            $('#people_filling_nd_spot')
                .prop('number', prev_val)
                .animateNumber(
                    {
                        number: (prev_val - z)
                    },
                    1000
                );
            $('#try_to_take_spot')
                .prop('number', Math.floor(prev_val/4))
                .animateNumber(
                    {
                        number: (Math.floor((prev_val - z)/4))
                    },
                    1000
                );
            prev_val = prev_val - z;

            if(how_many_times_increase > 3)
                how_many_times_increase = 0;
        }

        // $("#people_filling").html(prev_val);

        if(prev_val > 9999 && changefs == 1)
        {
            changeFSize();
            changefs = 2;
        }
        else if(prev_val > 999 && changefs == 0)
        {
            changeFSize();
            changefs = 1;
        }

        if(prev_val > 9999 && changefs == 0)
            changefs = 1;
    }

    function getRandomArbitrary(min, max)
    {
        return Math.random() * (max - min) + min;
    }

    (function loop() {
        var rand =  getRandomArbitrary(4000,9000);
        setTimeout(function() {
            doSomething();
            loop();
        }, rand);
    }());

    // onload actions
    $(function ($) {
        var fiveMinutes = 60 * 5,
            display = $('#time-exit');
        startTimer(fiveMinutes, display);
    });
    
    $('input[type=text], input[type=email]').on('change', function(){
        if ($(this).val()) {
           $(this).addClass('filled');
        } else {
           $(this).removeClass('filled');
        }
    });
})(jQuery);
JS;
$this->registerJs($script, yii\web\View::POS_READY);
?>
<div class="image-background">
    <div class="bg">
        <div class="container header">
            <div class="row">
                <div class="col-xs-12 logo vcenter col-lg-2">
                    <img src="images/ClickMoneyLogo/Logo-white.svg">
                </div><!--
                --><div class="col-xs-12 col-lg-8 vcenter text-white">
                    <img src="images/nn.png">There are currently
                    <span class="feExitRed" id="people_filling_nd_spot">416</span> People On This Very Page Right Now.
                    <span class="feExitRed" id="try_to_take_spot">104</span> of Them Trying To Take <span class="feExitBold">Your Report</span> Right Now. <span class="feExitBold">Act Quickly!</span>
                </div><!--
                --><div class="col-xs-12 lic text-right vcenter col-lg-2">
                    <span class="licenceLeft">1</span><span class="licenceRight">Report Left</span>
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
                --><div class="col-md-5 col-xs-12 vcenter right_block">
                    <div class="row text-center">
                        <div class="col-xs-12">
                            <h2 class="exitWarning"><span>WARNING:</span> Download Your <strong>Free ClickMoney Report</strong> Before This Exclusive Offer Expires!</h2>
                        </div>
                        <div class="col-xs-12">
                            <p class="exitNotification">Enter your first name and best email address below to proceed:</p>
                        </div>
                    </div><!--
                    --><div class="row action-form">
                        <div class="col-xs-12">
                            <form method="post" id="freereport-form" action="javascript:;">
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
                                        <img class="main-arrow hidden-md hidden-sm hidden-xs" src="images/arfe3.png">
                                        <button type="submit">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    FAST! CLICK HERE TO GET THE REPORT
                                                </div>
                                            </div>
                                        </button>
                                        <div class="warranty-text"><img class="blockImg" src="images/block.png" />
                                            <span>The Last Spot Is Still Here. Grab it Before Someone Else Does!</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!--
                    --><div class="row">
                        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 exitDown">
                            <span>HURRY!</span> Download Link Expires in: <span id="time-exit">00h : 03m : 27s</span>
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

<?php
foreach ($forms as $form) {
    $i = 0;
    foreach ($form['forms'] as $key => $value) {
        echo \Yii::$app->view->renderFile('@app/views/site/forms/form_' . $key . '.php', ['item' => ($i + 1) . (empty($form['prefix']) ? '' : '_' . $form['prefix']), 'params' => $value]);
        $i++;
    }
}
?>

<?= \Yii::$app->view->renderFile('@app/views/site/popups/thankYou.php'); ?>
