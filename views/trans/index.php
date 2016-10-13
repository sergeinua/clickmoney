<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>
<div class="trans-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'trans')->textInput(['maxlength' => true])->label('first name') ?>

        <?= $form->field($model, 'aff_if')->textInput(['maxlength' => true])->label('email') ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
