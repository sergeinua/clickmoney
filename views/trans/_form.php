<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Trans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trans-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'trans')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aff_if')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'actionid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datetime')->textInput() ?>

    <?= $form->field($model, 'offer_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
