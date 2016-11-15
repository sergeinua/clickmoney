<?php
use Mobile_Detect;

use yii\helpers\Url;
use yii\bootstrap\Modal;
use app\assets\JvAsset;

JvAsset::register($this);

Yii::$app->params['bodyClass'] = 'jv';

/* @var $this yii\web\View */

$script_init = <<< JS
    sessionStorage.setItem('show_exit_popup', 'true');
JS;
$this->registerJs($script_init, yii\web\View::POS_BEGIN);

$script = <<< JS
    setTimeout(function(){
        $(document).mousemove(function (e) {
            if (e.pageY <= 20 && sessionStorage.getItem('show_exit_popup') == 'true') {
                $("#JV-Exit-Pop").modal('show');
            }
        });
        $('#JV-Exit-Pop').on('hidden.bs.modal', function() {
            sessionStorage.setItem('show_exit_popup', 'false');
        });
    }, 10000);
JS;
$this->registerJs($script, yii\web\View::POS_READY);

$this->title = '#1 Click Money System';

$mob = new Mobile_Detect();
if ($mob->isTablet() || $mob->isMobile()) {
    $from_page = 'mobile';
    $is_mobile = true;
}
?>

    <header>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 logo">
                        <img src="/images/whiteLogo.png">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 membership">
                        <h2><span class="yellow">$5 Million</span> In Affiliate <br class="hidden"> Commissions To Pay
                        </h2>
                    </div>
                </div>
                <div class="row header">
                    <div class="col-md-12">
                        And <span class="yellow">$250,000</span> In Bonus Cash Up For Grabs
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left-right-container form">
                        <h2 class="register-right-text">Enter Your <span
                                class="reg-bold">Name, Email & ClickSure ID</span> To Receive Instant Access To The JV
                            Tools Page</h2>
                        <div id="gaff">
                            <input id="brokerName" type="hidden" value="brokenName">
                            <form id="caffForm" method="post" name="caffForm"
                                  action="http://www.aweber.com/scripts/addlead.pl">
                                <div style="display: none;">
                                    <input name="meta_web_form_id" value="1526564917" type="hidden">
                                    <input name="meta_split_id" value="" type="hidden">
                                    <input name="listname" value="awlist3742284" type="hidden">
                                    <input name="redirect" value="<?= Url::toRoute(['jv/index'], true); ?>#affiliate"
                                           id="redirect_4c2c6d2f8671de852f98b2465e0a5f09" type="hidden">
                                    <input name="meta_redirect_onlist"
                                           value="<?= Url::toRoute(['jv/index'], true); ?>#affilate" type="hidden">
                                    <input name="meta_adtracking" value="My_Web_Form_2" type="hidden">
                                    <input name="meta_message" value="1" type="hidden">
                                    <input name="meta_required" value="email" type="hidden">
                                    <input name="meta_tooltip" value="" type="hidden">
                                </div>
                                <div class="row">
                                    <div class="col-xs-5 form-group">
                                        <label class="label">My name’s</label>
                                    </div>
                                    <div class="col-xs-7 form-group">
                                        <input class="form-control email-reg-name email-Reg0 email-Reg4" name="name"
                                               pattern="^(?=.{3,15}$)[a-zA-Z][a-zA-Z][\u0600-\u06FF]*$*\s?[a-zA-Z][\u0600-\u06FF]*$+$"
                                               placeholder="John" required=""
                                               title="Please enter 3-15 characters (alphabets only)" type="text"
                                               value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-5 form-group">
                                        <label class="label">My best email is</label>
                                    </div>
                                    <div class="col-xs-7 form-group">
                                        <input class="form-control email-reg-name email-Reg0 email-Reg4"
                                               data-error="Bruh, that email address is invalid" name="email"
                                               placeholder="john@example.com" required="" type="email" value="">
                                    </div>
                                </div>
                                <div class="row register-last-row">
                                    <div class="col-xs-5 form-group">
                                        <label class="label">Clicksure ID</label>
                                    </div>
                                    <div class="col-xs-7 form-group">
                                        <input class="form-control email-reg-name email-Reg0 email-Reg4"
                                               name="custom Clicksure ID" pattern=".{6,10}"
                                               placeholder="Clicksure ID Here: 123456" required="" type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <button type="submit">
                                            <div class="row">
                                                <div class="col-md-12 col-xs-9">
                                                    GET ME MY JV TOOLS RIGHT NOW
                                                </div>
                                                <div class="arrow-right">
                                                    <img src="/images/Layer39.png">
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-11 col-md-offset-2 col-xs-12 block-text">
                            <img class="blockImg" src="/images/block.png">We will never share or sell your personal
                            information.
                        </div>
                    </div>
                </div>
            </div>
            <div id="affiliate" class="text-center">
                <h3>Grab Your CM<span> CLICKSURE</span><br/> Affiliate Link Below</h3>
                <input type="text" class="grabinput" value="http://xxxx.clickmoney.cpa.clicksure.com" />
            </div>
        </div>
    </header>
    <section class="cach-prizes">
        <div class="container memebership_content">
            <p>SEE WHAT YOU COULD WIN</p>
            <h3>CASH PRIZES</h3>
        </div>
    </section>
    <section class="faq">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <p class="green-dark">FIRST PLACE</p>
                    <p class="white bolder">$25,000</p>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <p class="green-dark">SECOND PLACE</p>
                    <p class="white">$10,000</p>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <p class="green-dark">THIRD PLACE</p>
                    <p class="white">$5,000</p>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <p class="grey">FOURTH PLACE</p>
                    <p class="green">$2,500</p>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <p class="grey">FIFTH PLACE</p>
                    <p class="green">$1,500</p>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <p class="grey">SIXTH-TENTH PLACE</p>
                    <p class="green">$500</p>
                </div>
            </div>
        </div>
    </section>
    <section class="membership-footer">
        <div class="container footer">
            <div class="col-md-4 col-xs-6 copyright">
                <p><?= date('Y'); ?> ClickMoney. All Rights Reserved</p>
            </div>
            <div class="col-md-8 col-xs-6 copyright vcenter menu">
                <ul>
                    <li><a href="<?= Url::toRoute(['site/disclaimer']); ?>" target="_blank">Government Disclaimer</a>
                    </li>
                    <li><a href="<?= Url::toRoute(['site/privacy-policy']); ?>" target="_blank">Privacy Policy</a></li>
                    <li><a href="<?= Url::toRoute(['site/terms']); ?>" target="_blank">Terms</a></li>
                    <li><a href="<?= Url::toRoute(['site/earnings-disclaimer']); ?>" target="_blank">Earnings
                            Disclaimer</a></li>
                    <li><a href="<?= Url::toRoute(['site/spam-policy']); ?>" target="_blank">Spam Policy</a></li>
                    <li><a href="mailto: <?= Yii::$app->params['support_email']; ?>">Support</a></li>
                </ul>
            </div>
        </div>
    </section>

<?= \Yii::$app->view->renderFile('@app/views/jv/popups/exitJv.php'); ?>