<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Trans */

$this->title = 'Create Trans';
$this->params['breadcrumbs'][] = ['label' => 'Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trans-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
