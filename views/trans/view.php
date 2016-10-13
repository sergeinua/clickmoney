<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Trans */

$this->title = $model->trans;
$this->params['breadcrumbs'][] = ['label' => 'Trans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trans-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->trans], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->trans], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'trans',
            'aff_if',
            'actionid',
            'datetime',
            'offer_name',
        ],
    ]) ?>

</div>
