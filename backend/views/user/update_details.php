<?php
//var_dump($model);

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin([
    'id' => 'details',
]);
?>

<div class="settings-title settings">

<?= $form->field($model,'username')->textInput()?>

<?= $form->field($model,'display_name')->textInput(['placeholder'=>"Capitalise your username. Must Match"])?>

<?= $form->field($model,'email')->input('email')?>
</div>
    <div class="form-group">
        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>
<?php

ActiveForm::end();