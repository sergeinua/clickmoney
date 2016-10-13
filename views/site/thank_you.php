<?php
use yii\bootstrap\Modal;

$this->registerCssFile(Yii::$app->request->baseUrl.'/web/css/style.css');
$this->registerCssFile('https://fonts.googleapis.com/css?family=Montserrat');
$this->registerJsFile('http://beneposto.pl/jqueryrotate/js/jQueryRotateCompressed.js');
$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js');
$this->registerJsFile('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', ['integrity' => "sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa", 'crossorigin' => "anonymous"]);


$script = <<< JS
    var angle = 0;
    $(function(){
        var rt = function() {
            $(".arrows-for-thanks3").addClass('rotated');
            setTimeout(function(){
                $(".arrows-for-thanks3").removeClass('rotated');
            }, 4000);
        };
        rt();
        setInterval(rt,4200);
    });
JS;
$this->registerJs($script, yii\web\View::POS_READY);
?>
    <?php Modal::begin(['id' => 'loading-sec']); ?>

        <div class="modal-thanks-text1">
            YOU'RE ALMOST THERE!
        </div>
        <div class="arrows-for-thanks3">
            <img src="/images/thankYou/backAr3a.png">
            <img src="/images/thankYou/backAr3a.png">
            <img src="/images/thankYou/backAr3a.png">
        </div>
        <div class="modal-thanks-text2">
            <h4>THANK YOU!</h4>
        </div>
        <div class="modal-thanks-text3">
            Just one moment while we verify your <br> private E-Mail and IP Address now.
        </div>

    <?php Modal::end(); ?>