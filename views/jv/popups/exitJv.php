<?php
use yii\bootstrap\Modal;
use app\assets\AppAsset;
use yii\helpers\Url;

$script_init = <<< JS
    function disableExitPopup() {
        sessionStorage.setItem('show_exit_popup', 'false');
    }
JS;
$this->registerJs($script_init, yii\web\View::POS_BEGIN);

Modal::begin([
    'options' => [
        'id' => 'JV-Exit-Pop',
        'class' => 'modal fade video-popup jv-pop',
        'tabindex' => "-1",
        'role' => "dialog",
        'aria-labelledby' => "my-modal-box-l",
        'aria-hidden' => "true"
    ],
    'closeButton' => false,
    'size' => Modal::SIZE_LARGE,
]); ?>

<div class="wrapper">
    <a href="" class="pull-right login-close" data-dismiss="modal" aria-label="Close"><img
            src="/images/close-video.png"></a>
    <h2><span class="yellow">WAIT! Don’t Leave Empty Handed!</span></h2>
    <h3>Get Your Insider Super Affiliate Newsletter</h3>
    <h4>Discover insider <strong>super affiliate conversion tricks</strong> to raise your conversions, findout
        your leaderboard standings and cash prizes and stay informed on important launch deays.</h4>
    <form name="form1" id="top_form" target="_top" method="post"
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
        <input data-error="Bruh, that email address is invalid" name="email" id="email"
               placeholder="Enter your email here" required="" type="email" value="">
        <button type="submit">ADD ME TO SUPER AFFILIATES</button>
    </form>
    <div class="clocks active bounce">
        <article class="clock simple">
            <div class="hours-container">
                <div class="hours"></div>
            </div>
            <div class="minutes-container">
                <div class="minutes"></div>
            </div>
        </article>
    </div>
</div>

<?php Modal::end(); ?>
