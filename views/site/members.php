<?php
use yii\web\JqueryAsset;

$this->registerCssFile(Yii::$app->request->baseUrl.'/web/css/_style.css');
$this->registerCssFile('https://fonts.googleapis.com/css?family=Montserrat');
$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js', ['depends' => [JqueryAsset::className()]]);
$this->registerJsFile('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', ['integrity' => "sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa", 'crossorigin' => "anonymous", 'depends' => [JqueryAsset::className()]]);

$script = <<< JS
    $(document).ready(function () {
       $('.membship5 li').on('click', function(){
           var item_class = $(this).data('class');
           $('.membship5 .content div.active').removeClass('active');
           $('.membship5 .' + item_class).addClass('active');
           $('.membship5 .' + item_class + ' h3').text($(this).text());
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
   });
JS;

$this->registerJs($script, yii\web\View::POS_READY);
?>

<div class="row membship1">
    <div class ="membship0">
        <div class="container header">
            <div class="row ">
                <div class="welcHead col-lg-12">WELCOME</div>
            </div>
            <div class="row">
                <div class="welcHead1 col-lg-12"><h2>This is the CLICKMONEY Biz Members Area</h2></div>
            </div>
            <div class="row">
                <div class="col-md-2 col-xs-12 logo1">
                    <img src="/images/ClickMoneyLogo/Logo-yellow.svg">
                </div>
                <div class="col-md-8 col-xs-12">
                    Please Watch The <span class="text-dashed">Video Below</span> For Further Instructions
                </div>
                <div class="col-md-2 col-xs-12 boxIcon">
                    <div class="row">
                        <div class="col-md-2 elOne0">
                            <img src="/images/elipsOne.png">
                        </div>
                        <div class="col-md-10 row">
                            <div class="col-lg-12 textHeadMemb0">LICENCE LEFT</div>
                            <div class="col-lg-12 textHeadMemb1">UPDATED SEP 20 2016</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container content">
            <div class="row">
                <div class="col-md-7 left_block">
                    <!--<iframe class="embed-responsive-item video_through" src="http://www.youtube.com/embed/ePbKGoIGAXY" poster="images/imagineForVideo.png"></iframe>-->
                    <div class="embed-responsive-item video_through">
                        <img class="play-button" src="/images/play.png">
                    </div>
                    <div class="text-for-video">
                        <span>Watch the Video Now! Expires in: 00h:03m:27s</span>
                    </div>
                    <div class="arrow-for-video">
                        <img src="/images/yellowArrow1.png">
                    </div>
                </div>
                <div class="col-md-5 right_block">
                    <h2 class="register_text">Please <b class="stripped_underline">register</b> your Clickmoney biz below</h2>
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10 col-xs-12">
                            <div class="row">
                                <div class="left_item col-md-6">
                                    <span>First Name</span>
                                </div>
                                <div class="right_item col-md-6">
                                    <div class="form-group">
                                        <input type="text" value="<?= $fname; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10 col-xs-12">
                            <div class="row">

                                <div class="left_item_not_stripped col-md-6">
                                    <button class="col-xs-12 dropdown-toggle email-reg-coundtry " type="button" data-toggle="dropdown">Bulgaria <i class="caret"></i><br>
                                    </button>
                                </div>



                                <div class="right_item col-md-6">
                                    <div class="form-group">
                                        <input type="text" value="+359 878 542611">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10 col-xs-12">
                            <div class="row">
                                <div class="left_item col-md-6">
                                    <span>Your Best Email</span>
                                </div>
                                <div class="right_item validation_failded col-md-6">
                                    <div class="form-group">
                                        <input class="email_text" type="text" value="<?= $email; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="button1 button_left_align col-md-12 col-xs-6">
                            <div class="row">
                                <div class="col-md-1 col-xs-1">
                                    <img src="/images/memb/Layer18.png">
                                </div>
                                <div class="col-md-11 col-xs-11 proceed">
                                    <span>unlock my personal account now</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="row">
                        <div class="row blockMob">
                            <div class="col-md-10 col-md-offset-1 licence">
                                <div><img class="blockImg" src="/images/block.png">Guaranteed Secure Access Ensured by Trusted Companies</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-10 col-md-offset-1 col-xs-12 blockIconsMob">
                        <div class="row">
                            <div class="col-xs-12 col-md-3 col-sm-3">
                                <a href="#"><img src="/images/mcafee.png"></a>
                            </div>
                            <div class="col-xs-12 col-md-3 col-sm-3">
                                <a href="#"><img src="/images/truste.png"></a>
                            </div>
                            <div class="col-xs-12 col-md-3 col-sm-3">
                                <a href="#"><img src="/images/red.png"></a>
                            </div>
                            <div class="col-xs-12 col-md-3 col-sm-3">
                                <a href="#"><img src="/images/norton.png"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row membship2">
    <div class="memebership_content">
        <p><span class="green">3</span> Quick and Easy Steps</p>
        <p class="text">TO START YOUR BUSINESS</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-5">
                    <img class="first-arrow" src="/images/arrowGreen.png">
                    <img class="first-arrow-add" src="/images/memb/Ellipse3green.png">
                    <div class="first-num">1</div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="grey">YOU'RE HERE!</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="green">Register</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="green register-label">Sign up to the system, choose a username and a password</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-1 arrow hidden-xs hidden-sm">
            <img src="/images/arrowLittleGreen.png">
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-4">
                    <img class="second-arrow" src="/images/memb/arrGrey.png">
                    <img class="second-arrow-add" src="/images/memb/Ellipse3copy.png">
                    <div class="second-num">2</div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="steps-title">Deposit</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="grey-small-text">Find your trading account with minimum investment of $250</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1 arrow hidden-xs hidden-sm">
            <img src="/images/arrowLittleGreen.png">
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-4">
                    <img class="third-arrow" class="third-arrow arrow-transform-right" src="/images/memb/arrGrey.png">
                    <img class="third-arrow-add" src="/images/memb/Ellipse3copy.png">
                    <div class="third-num">3</div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="steps-title">Profit!</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="grey-small-text">Open a bottle of champagne and watch the money rain!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row membship3">
    <div class="membership-text col-md-12">
        <div class="text-center text-days">180 DAYS</div>
        <div class="text-center text-lower">SEE WHAT CLICKMONEY CAN DO IN JUST</div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 single-item">
                <div class="row">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item video_through" src="http://www.youtube.com/embed/ePbKGoIGAXY" poster="/images/imagineForVideo.png"></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 video-item">
                        <p>See How Joan Made</p>
                        <p><span class="green-small-text">$1,344,521</span> in <span class="green-small-text">87 days</span></p>
                        <p class="small-text">Clickmoney was a lifechanger for Joan. Watch her testimonial and prepare to be amazed.
                            Clickmoney was a lifechanger for Joan. Watch her testimonial and prepare to be amazed</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 single-item">
                <div class="row">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item video_through" src="http://www.youtube.com/embed/ePbKGoIGAXY" poster="/images/imagineForVideo.png"></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 video-item">
                        <p>See How Joan Made</p>
                        <p><span class="green-small-text">$1,344,521</span> in <span class="green-small-text">87 days</span></p>
                        <p class="small-text">Clickmoney was a lifechanger for Joan. Watch her testimonial and prepare to be amazed.
                            Clickmoney was a lifechanger for Joan. Watch her testimonial and prepare to be amazed</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 single-item">
                <div class="row">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item video_through" src="http://www.youtube.com/embed/ePbKGoIGAXY" poster="/images/imagineForVideo.png"></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 video-item">
                        <p>See How Joan Made</p>
                        <p><span class="green-small-text">$1,344,521</span> in <span class="green-small-text">87 days</span></p>
                        <p class="small-text">Clickmoney was a lifechanger for Joan. Watch her testimonial and prepare to be amazed.
                            Clickmoney was a lifechanger for Joan. Watch her testimonial and prepare to be amazed</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 single-item">
                <div class="row">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item video_through" src="http://www.youtube.com/embed/ePbKGoIGAXY" poster="/images/imagineForVideo.png"></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 video-item">
                        <p>See How Joan Made</p>
                        <p><span class="green-small-text">$1,344,521</span> in <span class="green-small-text">87 days</span></p>
                        <p class="small-text">Clickmoney was a lifechanger for Joan. Watch her testimonial and prepare to be amazed.
                            Clickmoney was a lifechanger for Joan. Watch her testimonial and prepare to be amazed</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 single-item">
                <div class="row">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item video_through" src="http://www.youtube.com/embed/ePbKGoIGAXY" poster="/images/imagineForVideo.png"></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 video-item">
                        <p>See How Joan Made</p>
                        <p><span class="green-small-text">$1,344,521</span> in <span class="green-small-text">87 days</span></p>
                        <p class="small-text">Clickmoney was a lifechanger for Joan. Watch her testimonial and prepare to be amazed.
                            Clickmoney was a lifechanger for Joan. Watch her testimonial and prepare to be amazed</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 single-item">
                <div class="row">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item video_through" src="http://www.youtube.com/embed/ePbKGoIGAXY" poster="/images/imagineForVideo.png"></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 video-item">
                        <p class="blank-text">Join Our Successful</p>
                        <p class="blank-text">Members Club!</p>
                        <div class="register-btn">
                            <p>REGISTER YOUR CLICKMONEY BIZ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="has-background">
    <div class="row membship2">
        <div class="text-center">
            <p class="grey">THIS OFFER CLOSES IN<span class="count-down">3m</span><span class="count-down">35s</span></p>
            <p class="register-text"><span class="green">Last chance,</span> Register your</p>
            <p class="register-text">ClickMoney Biz Right Now</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-3 mem-first-arrow-left hidden-xs hidden-sm hidden-md">
                            <img src="/images/arrowleft1.png">
                        </div>
                        <div class="left_item col-md-3 col-xs-6">
                            <span>First Name</span>
                        </div>
                        <div class="right_item col-md-3 col-xs-6">
                            <div class="form-group">
                                <input type="text" value="<?= $fname; ?>">
                            </div>
                        </div>
                        <div class="col-md-3 hidden-xs hidden-sm hidden-md">
                            <img class="mem-first-arrow-right" src="/images/arrowleft1.png">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 mem-second-arrow-left hidden-xs hidden-sm hidden-md">
                            <img src="/images/arrowLittleGreen.png">
                        </div>
                        <div class="left_item_not_stripped col-md-3 col-xs-6">
                            <button class="col-xs-12 dropdown-toggle email-reg-coundtry " type="button" data-toggle="dropdown">Bulgaria <i class="caret"></i><br>
                            </button>
                        </div>
                        <div class="right_item col-md-3 col-xs-6">
                            <div class="form-group">
                                <input type="text" value="+359 878 542611">
                            </div>
                        </div>
                        <div class="col-md-3 mem-second-arrow-right hidden-xs hidden-sm hidden-md">
                            <img class="arrow-reversed" src="/images/arrowLittleGreen.png">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 mem-third-arrow-left hidden-xs hidden-sm hidden-md">
                            <img src="/images/arrowleft1.png">
                        </div>
                        <div class="left_item col-md-3 col-xs-6">
                            <span>Your Best Email</span>
                        </div>
                        <div class="right_item validation_failded col-md-3 col-xs-6">
                            <div class="form-group">
                                <input class="email_text" type="text" value="<?= $email; ?>">
                            </div>
                        </div>
                        <div class="col-md-3 mem-third-arrow-right hidden-xs hidden-sm hidden-md">
                            <img src="/images/arrowleft1.png">
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                    <a href="#">
                        <div class="button1 lowest-btn">
                            <div class="row">
                                <div class="col-xs-2">
                                    <img src="/images/memb/Layer18.png">
                                </div>
                                <div class="col-xs-10">
                                    <span>unlock my personal account now</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="blockMob">
                            <div class="col-md-6 col-md-offset-3 licence">
                                <div><img class="blockImg" src="/images/block.png">Guaranteed Secure Access Ensured by Trusted Companies</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-md-offset-3">
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="#"><img src="/images/mcafee.png"></a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#"><img src="/images/truste.png"></a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#"><img src="/images/red.png"></a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#"><img src="/images/norton.png"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row membship5">
    <div class="container">
        <div class="hidden-sm hidden-xs">
            <div class="row">
                <div class="col-md-5">
                    <h3>FAQ</h3>
                    <ul>
                        <li class="active" data-class="item-1">What is ClickMoney?</li>
                        <li data-class="item-2">How much does it cost?</li>
                        <li data-class="item-3">What if I already have account?</li>
                        <li data-class="item-4">What is the success rate fo ClickMoney?</li>
                        <li data-class="item-5">How much money can I earn per day?</li>
                        <li data-class="item-6">How many people have found success so far?</li>
                    </ul>
                </div>
                <div class="col-md-7">
                    <div class="content">
                        <div class="item-1 active">
                            <h3>What is ClickMoney?</h3>
                            <p>It is a state-of-the-art cash generating system that legally taps into a 50 Billion dollar
                                global market and leverages it to make millions for its users.</p>
                        </div>
                        <div class="item-2">
                            <h3></h3>
                            <p>You will need to open a new account and fund it in order to get free access to the ClickMoney
                                software.</p>
                        </div>
                        <div class="item-3">
                            <h3></h3>
                            <p>ClickMoney software needs to validate your account and its done automatically after
                                you’ve funded your trading account with one of the recommended brokers.</p>
                        </div>
                        <div class="item-4">
                            <h3></h3>
                            <p>The average success rate for ClickMoney members is 99%.</p>
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
                            <p>Millions.</p>
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
                                <p>It is a state-of-the-art cash generating system that legally taps into a 50 Billion dollar
                                    global market and leverages it to make millions for its users.</p>
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
                                <p>You will need to open a new account and fund it in order to get free access to the ClickMoney
                                    software.</p>
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
                                <a data-toggle="collapse"  href="#collapseFour">What is the success rate fo ClickMoney?</a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>The average success rate for ClickMoney members is 99%.</p>
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
                                <a data-toggle="collapse"  href="#collapseSix">How many people have found success so far?</a>
                            </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Millions</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row footer">
        <div class="col-md-3 col-lg-offset-1 col-xs-6 copyright">
            <p>2016 Clickmoney. All Rights Reserved</p>
        </div>
        <div class="col-md-6 col-md-offset-2 col-xs-6 copyright">
            <span>Government Disclamer</span>
            <span> | </span>
            <span>Privacy Policy</span>
            <span> | </span>
            <span>Terms</span>
            <span> | </span>
            <span>Earnings Disclaimer</span>
            <span> | </span>
            <span>Spam policy</span>
            <span> | </span>
            <span>Support</span>
        </div>
    </div>
</div>
