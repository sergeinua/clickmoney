<?php
use yii\bootstrap\Modal;
use yii\helpers\Url;

//$this->registerCssFile(Yii::$app->request->baseUrl.'/web/css/fe1.css');
$this->registerCssFile(Yii::$app->request->baseUrl.'/web/css/style_fe_exit.css');
//$this->registerCssFile('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', ['integrity' => "sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u", 'crossorigin' => "anonymous"]);
//$this->registerCssFile('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css', ['integrity' => "sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp", 'crossorigin' => "anonymous"]);
$script = <<< JS
    
JS;
//$this->registerJs($script, yii\web\View::POS_READY);
?>


    <?php Modal::begin(['id' => 'myModal']); ?>

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
                            <button id="modal-submit" class="col-sm-8 button1 buttonEXRed col-md-9 col-md-offset-1 col-xs-7 col-xs-offset-0 col-lg-10 col-lg-offset-1">
                                <div class="col-md-12 col-xs-12 proceed btnFE2 btnFE3">
                                    <span>FAST! CLICK HERE TO GET THE REPORT</span>
                                </div>
                            </button>
<!--                            </a>-->
                            <div class="row">
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
                                <li><a href="<?= Url::toRoute(['site/disclaimer']); ?>" target="_blank">Government Disclaimer | </a></li>
                                <li><a href="<?= Url::toRoute(['site/privacy-policy']); ?>" target="_blank">Privacy Policy | </a></li>
                                <li><a href="<?= Url::toRoute(['site/terms']); ?>" target="_blank">Terms | </a></li>
                                <li><a href="<?= Url::toRoute(['site/earnings-disclaimer']); ?>" target="_blank">Earnings Disclaimer | </a></li>
                                <li><a href="<?= Url::toRoute(['site/spam-policy']); ?>" target="_blank">Spam Policy | </a></li>
                                <li><a href="mailto: <?= Yii::$app->params['support_email']; ?>">Support</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 copyright1 col-lg-3 col-sm-3">
                            <span class="copyright">© <?= date('Y'); ?> ClickMoney. All Rights Reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php Modal::end(); ?>