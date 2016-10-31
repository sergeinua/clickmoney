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

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel='shortcut icon' href='/images/favicon.ico' type='image/x-icon'>
    <link rel="icon" type="image/png" href="/images/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="/images/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/images/favicon-48x48.png" sizes="48x48">
    <link rel="icon" type="image/png" href="/images/favicon-96x96.png" sizes="96x96">
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
