<?php
//var_dump($model);

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin([
    'id' => 'profile',
]);
?>

    <div class="settings-title settings">

        <?= $form->field($profile,'firstname')->textInput()?>
        <?= $form->field($profile,'lastname')->textInput()?>

    </div>
    <div class="form-group">
        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>
<?php

ActiveForm::end();