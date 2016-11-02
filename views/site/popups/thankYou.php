<?php
use yii\bootstrap\Modal;
use app\assets\AppAsset;

$this->registerCssFile(Yii::$app->request->baseUrl.'/css/thank-you.css', ['depends' => [AppAsset::className()]]);

$script = <<< JS
    $(function(){
        (function rotate () {
            $(".thank-you .arrow").addClass('rotated');
            setTimeout(function(){
                $(".thank-you .arrow").removeClass('rotated');
                setTimeout(function() {
                    rotate();
                }, 200);
            }, 4000);
        })();
    });
JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>
    <?php Modal::begin([
        'options' => [
            'id' => 'loading_sec',
            'class' => 'thank-you',
            'tabindex' => "-1",
            'role' => "dialog",
            'aria-labelledby' => "my-modal-box-l",
            'aria-hidden' => "true"
        ],
        'size' => Modal::SIZE_LARGE,
        'clientOptions' => [
//            'show' => true,
            'backdrop' => 'static',
            'keyboard' => 'false'
        ]
    ]); ?>

        <p class="header-text">
            YOU'RE ALMOST THERE!
        </p>
        <p class="arrow">
            <img src="images/thankYou/backAr3a.png">
            <img src="images/thankYou/backAr3a.png">
            <img src="images/thankYou/backAr3a.png">
        </p>
        <p class="thank-you-block">
            <span>THANK YOU!</span>
        </p>
        <p class="footer-text">
            Just one moment while we verify your<br/><strong>private E-Mail</strong> and <strong>IP Address</strong> now.
        </p>

    <?php Modal::end(); ?>
