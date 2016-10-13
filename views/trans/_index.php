<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TransSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trans-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Trans', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'trans',
            'aff_if',
            'actionid',
            'datetime',
            'offer_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
