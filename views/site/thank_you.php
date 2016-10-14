<?php
use yii\bootstrap\Modal;
use yii\bootstrap\BootstrapAsset;

$this->registerCssFile(Yii::$app->request->baseUrl.'/web/css/thank-you.css', ['depends' => [BootstrapAsset::className()]]);

$script = <<< JS
    $(function(){
        var rt_arrow = function() {
            $(".arrow").addClass('rotated');
            setTimeout(function(){
                $(".arrow").removeClass('rotated');
            }, 4000);
        };
        rt_arrow();
        setInterval(rt_arrow, 4200);
    });
JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>
    <?php Modal::begin([
        'options' => [
            'id' => 'loading-sec',
            'class' => 'thank-you',
            'tabindex' => "-1",
            'role' => "dialog",
            'aria-labelledby' => "my-modal-box-l",
            'aria-hidden' => "true"
        ],
        'size' => Modal::SIZE_LARGE,
        'clientOptions' => [
//            'show' => true,
            'backdrop' => 'static'
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
