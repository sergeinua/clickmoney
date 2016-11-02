<?php
use yii\bootstrap\Modal;
use app\assets\AppAsset;

$this->registerCssFile(Yii::$app->request->baseUrl.'/css/exit-popup.css', ['depends' => [AppAsset::className()]]);

$script_init = <<< JS
    function disableExitPopup() {
        sessionStorage.setItem('show_exit_popup', 'false');
    }
JS;
$this->registerJs($script_init, yii\web\View::POS_BEGIN);

$oheader = <<<HEA
        <div class="row close-btn-block">
            <div class="col-xs-9 col-md-6 vcenter">
                <span class="licenceLeft">1</span><span class="licenceRight">SPOT LEFT</span>
            </div><!--
            --><div class="col-xs-3 col-md-6 vcenter">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="disableExitPopup();"><span class="hidden-xs hidden-sm">Click here To Close Sign Up Form</span> | ×</button>
            </div>
        </div>
HEA;

Modal::begin([
    'options' => [
        'id' => 'exitpopup',
        'class' => 'fe2 freereport',
        'tabindex' => "-1",
        'role' => "dialog",
        'aria-labelledby' => "my-modal-box-l",
        'aria-hidden' => "true"
    ],
    'closeButton' => false,
    'header' => $oheader,
    'size' => Modal::SIZE_DEFAULT,
]); ?>

<div class="container-fluid">
    <div class="row text-center">
        <div class="col-xs-12">
            <h2 class="exitWarning"><span>WARNING:</span> Unlock Your <strong>Free Click Money System</strong> Before This Exclusive Offer Expires!</h2>
        </div>
        <div class="col-xs-12">
            <p class="exitNotification">Enter your first name and best email address below to proceed:</p>
        </div>
    </div><!--
        --><div class="row action-form">
        <div class="col-xs-12">
            <form method="post" action="javascript:;" id="exit-popup-form">
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
                        <button type="submit" id="exit-send-btn">
                            <div class="row">
                                <div class="col-md-12">
                                    HURRY! CLICK MONEY FOR FREE
                                </div>
                            </div>
                        </button>
                        <div class="warranty-text"><img class="blockImg" src="images/svg/lock.svg" />
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
    </div><!--
        --><div class="row">
        <div class="col-lg-10 col-lg-offset-1 block-current-people text-center">
            <img src="images/orangeStop.png">There are currently
            <span class="feExitRed" id="people_filling_nd_spot">416</span> People On This Very Page Right Now.
            <span class="feExitRed" id="try_to_take_spot">104</span> of Them Trying To Take <span class="feExitBold">Your Spot</span> Right Now. <span class="feExitBold">Act Quickly!</span>
        </div>
    </div>
</div>

<?php Modal::end(); ?>
