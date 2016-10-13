<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trans-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'trans') ?>

    <?= $form->field($model, 'aff_if') ?>

    <?= $form->field($model, 'actionid') ?>

    <?= $form->field($model, 'datetime') ?>

    <?= $form->field($model, 'offer_name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
