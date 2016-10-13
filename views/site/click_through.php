<?php
use yii\helpers\Url;
use yii\bootstrap\BootstrapAsset;

//$this->registerCssFile(Yii::$app->request->baseUrl.'/web/css/style.css');
//$this->registerCssFile(Yii::$app->request->baseUrl.'/web/css/fe1.css');
$this->registerCssFile(Yii::$app->request->baseUrl.'/web/css/style_click_through.css', ['depends' => [BootstrapAsset::className()]]);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Montserrat');
$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js');
$this->registerJsFile('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', ['integrity' => "sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa", 'crossorigin' => "anonymous"]);
?>


<div class="clickthrough" xmlns="http://www.w3.org/1999/html">
    <div class="container header">
        <div class="row">
            <div class="col-md-7 col-xs-4 logo1">
                <img class="img-responsive" src="/images/register/logoWhite.png">
            </div>
            <div class="col-md-5 col-md-offset-7 col-xs-8 lic">
                <div class="col-md-4 licenceRight"><span>Licence Left</span></div>
                <div class="col-md-1 licenceLeft"><span>1</span></div>
            </div>
        </div>
    </div>
    <div class="container content">
        <div class="row content0">
            <div class="col-md-7 left_block left_block1">
                <img class="img-responsive img-left-block1" src="/images/imagineForVideoLarge.jpg">
                <img class="img-responsive play-button" src="/images/play.png">
            </div>
            <div class="col-md-5 right_block right_block1">
                <p class="welkGreen">WELCOME ABOARD!</p>
                <p class="clickbt">Click The Button Below</p>
                <p class="secure">To <span class="span-secr">Secure </span><span class="orange">1</span><span class="span-secr"> of the</span> <span class="orange">16</span> CLICK MONEY Biz Memberships</p>
                <div class="stop col-md-9 col-xs-9">
                    <div class="col-md-3 col-xs-4">
                        <img src="/images/stop.png" class="img-responsive img_stop">
                    </div>
                    <div class="do_not_ex0 col-md-8 col-xs-8">
                        <p class="stop_do_not_ex orange">Please <span class="red">DO NOT</span> Exit This Page!</p>
                        <p class="stop_do_not_ex1"">Or your spot will be given to the next person in line waiting to watch this video.</p>
                    </div>
                    <img src="/images/arrow-for-throu.png" class="img-responsive arr1">
                </div>
                <button type="submit" class="button1 button02">CLICK HERE TO PROCEED<img class="button-arrow" src="/images/arr.png" onclick="window.location.href='<?= Url::toRoute(['/site/members']); ?>';"></button>
                <div class="button2 col-md-10 col-xs-12"><span class="button20">REMINDER:</span> <span class="orange"><span class="big-number" style="font-size: 14px;">1</span> LICENSE LEFT</span></div>
            </div>
        </div>
    </div>
    <div class="container footer">
        <div class="row">
            <div class="col-md-1 col-xs-2 logWhite"><a href=""><img class="img-responsive" src="/images/register/logoWhiteL.png"></a></div>
            <div class="col-md-7">
                <ul class="fnavigation">
                    <li><a href="pagesForFooter/govermentDisclaimer.html" target="_blank">Government Disclaimer</a></li>
                    <li><a href="pagesForFooter/privacyPolicy.html" target="_blank">Privacy Policy</a></li>
                    <li><a href="pagesForFooter/terms.html" target="_blank">Terms</a></li>
                    <li><a href="pagesForFooter/earningsDisclaimer.html" target="_blank">Earnings Disclaimer</a></li>
                    <li><a href="pagesForFooter/spamPolicy.html" target="_blank">Spam Policy</a></li>
                    <li><a href="pagesForFooter/Support.html" target="_blank">Support</a></li>
                </ul>
            </div>
            <div class="col-md-4 copyright1">
                <span class="copyright">© 2016 ClickMoney. All Rights Reserved.</span>
            </div>
        </div>
    </div>
</div>




















<!--
<div class="clickthrough">
    <div class="container header">
        <div class="row">
            <div class="col-md-7 col-xs-4 logo1">
                <img src="/images/register/logoWhite.png">
            </div>
            <div class="col-md-5 col-xs-8 lic">
                <div class="col-md-4 licenceRight"><span>Licence Left</span></div>
                <div class="col-md-1 licenceLeft"><span>1</span></div>

            </div>
        </div>
    </div>
    <div class="container content">
        <div class="row content0">
            <div class="col-md-7 left_block">
                <iframe class="embed-responsive-item video_through" src="http://www.youtube.com/embed/ePbKGoIGAXY"
                        poster="/images/imagineForVideo.png"></iframe>
            </div>
            <div class="col-md-5 right_block">
                <p class="welkGreen">WELCOME ABOARD!</p>
                <h2 class="clickbt">Click The Button Below</h2>
                <h1 class="secure">To Secure <span class="orange">1</span> of the <span class="orange">16</span> CLICK
                    MONEY Biz Memberships</h1>
                <div class="stop col-md-10 col-xs-10">
                    <div class="col-md-3 col-xs-4">
                        <img src="/images/stop.png" class="img-responsive img_stop">
                    </div>
                    <div class="do_not_ex0 col-md-8 col-xs-8">
                        <p class="stop_do_not_ex orange">Please <span class="red">DO NOT</span> Exit This Page!</p>
                        <p class="stop_do_not_ex1"">Or your spot will be given to the next person in line waiting to
                        watch this video.</p>
                    </div>
                    <img src="/images/arrowleft1.png" class="img-responsive arr1">
                </div>
                <a href="<!?= Url::toRoute(['/site/members']); ?>">
                    <div class="button1 col-md-9 col-xs-6">
                        <div class="col-md-9 col-xs-10 proceed">
                            <span>CLICK HERE TO PROCEED</span>
                        </div>
                        <div class="col-md-1 col-xs-1 ">
                            <img src="/images/arr.png">
                        </div>
                    </div>
                </a>
                <div class="button2 col-md-10 col-xs-10">REMINDER: <span class="orange">LICENSE LEFT</span></div>
            </div>
        </div>
    </div>
    <div class="container footer">
        <div class="row">
            <div class="col-md-1 col-xs-2 logWhite"><a href=""><img src="/images/register/logoWhiteL.png"></a></div>
            <div class="col-md-7">
                <ul class="fnavigation">
                    <li><a href="#">Government | </a></li>
                    <li><a href="#">Disclaimer | </a></li>
                    <li><a href="#">Privacy Policy | </a></li>
                    <li><a href="#">Terms | </a></li>
                    <li><a href="#">Earnings Disclaimer | </a></li>
                    <li><a href="#">Spam Policy | </a></li>
                    <li><a href="#">Support | </a></li>
                </ul>
            </div>
            <div class="col-md-4 copyright1">
                <span class="copyright">© 2016 ClickMoney. All Rights Reserved.</span>
            </div>
        </div>
    </div>
</div>
-->