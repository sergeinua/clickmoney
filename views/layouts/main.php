<?php

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $body_class string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Montserrat');
$this->registerCssFile('https://fonts.googleapis.com/css?family=Open+Sans');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body<?= empty(Yii::$app->params['bodyClass']) ? '' : ' class="' . Yii::$app->params['bodyClass'] . '"' ?>>
<?php $this->beginBody() ?>

    <?= $content ?>

    <footer class="footer">
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
