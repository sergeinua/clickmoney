<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Trans */

$this->title = 'Update Trans: ' . $model->trans;
$this->params['breadcrumbs'][] = ['label' => 'Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->trans, 'url' => ['view', 'id' => $model->trans]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trans-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
