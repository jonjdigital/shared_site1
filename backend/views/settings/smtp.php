<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

$form = ActiveForm::begin([
    'id'=>"email_settings",
]);
?>
<div class="settings">
<h2>Editing <?= ucfirst($model->email_module)?> SMTP Settings</h2>
    <?= $form->field($model,'login_email')->input('email',['value'=>$model->login_email]); ?>
    <?= $form->field($model,'password')->input('password',['value'=>$model->password]); ?>
    <?= $form->field($model,'sender_name')->input('text',['value'=>$model->sender_name]); ?>
    <?= Html::submitButton('Save Changes', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
</div>
<?php
ActiveForm::end();