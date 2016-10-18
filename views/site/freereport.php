<?php
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;

$this->registerCssFile(Yii::$app->request->baseUrl.'/web/css/fe1.css');
$this->registerCssFile(Yii::$app->request->baseUrl.'/web/css/exit.css', ['depends' => [BootstrapAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/web/js/jquery.animateNumber.min.js', ['depends' => [JqueryAsset::className()]]);

$script = <<< JS
    $('body').addClass('fe2');
    function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);
    
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;
    
            display.text("00h : " + minutes + "m: " + seconds + "s");
    
            if (--timer < 0) {
                timer = duration;
            }
        }, 1000);
    }
    jQuery(function ($) {
        var fiveMinutes = 60 * 5,
            display = $('#time-exit');
        startTimer(fiveMinutes, display);
    });

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

    function peopleFilling()
    {
        //doSomething();
        (function loop() {
            var rand =  getRandomArbitrary(4000,9000);
            setTimeout(function() {doSomething(); loop();}, rand);
        }());
    }
    peopleFilling();
JS;
$this->registerJs($script, yii\web\View::POS_READY);
?>
<div class="exit-background">
        <div class="container header">
            <div class="row">
                <div class="col-xs-6 logo vcenter col-lg-2">
                    <img src="images/ClickMoneyLogo/Logo-white.svg">
                </div>
                <div class="col-xs-6 lic text-right vcenter col-lg-1 pull-right">
                    <span class="licenceLeft">1</span><span class="licenceRight">Report Left</span>
                </div>
                <div class="col-xs-12 col-lg-9 text-white row">
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
        <div class="container content">
            <div class="row">
                <div class="col-md-7 col-xs-12 video-through vcenter text-center left_block">
                    <img class="img-responsive" src="images/imagineForVideoLarge.jpg">
                    <img class="play" src="images/play.png" />
                    <!--<img class="play_gd" src="images/gd_corner_fe1.png" />-->
                    <!--<img class="play_logo" src="images/ClickMoneyLogo/Logo-green.svg" />-->
                </div><!--
                --><div class="col-md-5 col-xs-12 vtop right_block">
                    <div class="row text-center">
                        <div class="col-xs-12">
                            <h2 class="clickbtFE2 feExitWar0"><span class="feExitWar">WARNING:</span> Download Your Free ClickMoney Report Before This Exclusive Offer Expires!</h2>
                        </div>
                        <div class="col-xs-12">
                            <p class="notifExit">Enter your first name and best email address below to proceed:</p>
                        </div>
                    </div><!--
                    --><div class="row action-form">
                        <div class="col-xs-12">
                            <img class="main-arrow" src="images/arfe3.png">
                            <form method="post" action="">
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
                    </div>
                    <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 exitDown">
                        <span>HURRY!</span> Download Link Expires in: <span id="time-exit">00h : 03m : 27s</span>
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
                        <li><a href="#">Government</a></li>
                        <li><a href="#">Disclaimer</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Earnings Disclaimer</a></li>
                        <li><a href="#">Spam Policy</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div><!--
                --><div class="col-md-4 col-xs-12 text-right vcenter copyright">
                    &copy; 2016 ClickMoney. All Rights Reserved.
                </div>
            </div>
        </div>
</div>


<script src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://s3.amazonaws.com/caff/js/formhelpers.min.js"></script>
<script type="text/javascript">
    (function($) {
//        setInterval(function(){
//            $(".join-popup").addClass('showed');
//            setTimeout(function(){
//                $(".join-popup").removeClass('showed');
//            }, 2000);
//        }, 5000);
//        $(".join-popup .close-btn a").click(function(e){
//            $(".join-popup").removeClass('showed');
//            return false;
//        });
    })(jQuery);
</script>





















<!--


        <div class="clickthrough">
            <div class="fe-exit">
                <div class="container header">
                    <div class="row">
                        <div class="col-md-2 col-xs-12 logo1 col-sm-3">
                            <img src="/images/register/logoWhite.png">
                        </div>
                        <div class="col-md-8 col-xs-12 fex-text col-sm-6">
                            <img src="/images/nn.png">
                            There are currently <span class="feExitRed">416</span> People On This Very Page Right Now. <span class="feExitRed">104</span> of Them Trying To Take <span class="feExitBold">Your Report</span> Right Now. <span class="feExitBold">Act Quickly!</span>
                        </div>
                        <div class="col-md-2 col-xs-12 lic col-sm-3">
                            <div class="row">
                                <div class="col-md-8 licenceRight col-sm-7">
                                    <span>Report Left</span>
                                </div>
                                <div class="col-md-4 licenceLeft1 col-sm-5">
                                    <span>1</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container content ">
                    <div class="row content0">
                        <div class="col-md-7 left_block">
                            <div class="embed-responsive-item video_through video-img">
                                <img class="play-button" src="images/play.png">
                            </div>
                        </div>
                        <div class="col-md-5 right_block conFE2">
                            <h2 class="clickbtFE2 feExitWar0"><span class="feExitWar">WARNING:</span> Download Your <span class="bold-text">Free ClickMoney Report</span> Before This Exclusive Offer Expires!</h2>
                            <p class="notifExit" >Enter your first name and best email address below to proceed:</p>
                            <div class="col-md-10 initial col-xs-10">
                                <div>
                                    <div class="row">
                                        <div class="col-md-5 nameFE20 col-xs-12">My name's</div>
                                        <input id="modal-name" class="col-md-7 nameFE2 nameExit col-xs-12" placeholder="John">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 emailFE20 col-xs-12">My best email is</div>
                                        <input id="modal-email" class="col-md-7 emailFE2 col-xs-12" placeholder="john@example.com">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-xs-2">
                                <img class="arfe3" src="/images/arfe3.png">
                            </div>
<!--                            <a href="">-->
                <!--            <button id="modal-submit" class="col-sm-8 button1 buttonEXRed col-md-9 col-md-offset-1 col-xs-7 col-xs-offset-0 col-lg-10 col-lg-offset-1">
                                <div class="col-md-12 col-xs-12 proceed btnFE2 btnFE3">
                                    <span>FAST! CLICK HERE TO GET THE REPORT</span>
                                </div>
                            </button>
<!--                            </a>-->
              <!--              <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-11 col-lg-10 col-lg-offset-1 blockText blockText1 col-xs-12">
                                        <img class="blockImg" src="/images/block.png">
                                        The Last Spot Is Still Here. Grab it Before Someone Else Does!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10 col-xs-10 col-xs-offset-1 exitDown">
                                <span>HURRY!</span> Download Link Expires in: <span>00h : 03m : 27s</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container footer">
                    <div class="row">
                        <div class="col-md-2 col-xs-12 logWhite col-lg-2 col-sm-2"><a href=""><img src="/images/register/logoWhiteL.png"></a></div>
                        <div class="col-md-7 col-xs-12 col-lg-7 col-sm-7 copyright1">
                            <ul class="fnavigation">
                                <li><a href="<!?= Url::toRoute(['site/disclaimer']); ?>" target="_blank">Government Disclaimer | </a></li>
                                <li><a href="<!?= Url::toRoute(['site/privacy-policy']); ?>" target="_blank">Privacy Policy | </a></li>
                                <li><a href="<!?= Url::toRoute(['site/terms']); ?>" target="_blank">Terms | </a></li>
                                <li><a href="<!?= Url::toRoute(['site/earnings-disclaimer']); ?>" target="_blank">Earnings Disclaimer | </a></li>
                                <li><a href="<!?= Url::toRoute(['site/spam-policy']); ?>" target="_blank">Spam Policy | </a></li>
                                <li><a href="mailto: <!?= Yii::$app->params['support_email']; ?>">Support</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 copyright1 col-lg-3 col-sm-3">
                            <span class="copyright">© <!?= date('Y'); ?> ClickMoney. All Rights Reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

-->