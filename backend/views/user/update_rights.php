<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\switchinput\SwitchInput;

$form = ActiveForm::begin([
    'id' => 'access',
]);
?>

<div class="row" id="rights">
    <div class="col-md-1"></div>
    <div class="settings-title settings">
        User is currently: <?= $admin ?>
<?= $form->field($rights,'admin')->dropDownList(['default'=>'No Change','site_admin'=>'Site Admin','admin'=>'Admin','moderator'=>'Moderator','none'=>'Not Admin']) ?>
        <hr>
<?= $form->field($rights,'editor')->widget(SwitchInput::classname(), []);?>
<?= $form->field($rights,'patron')->widget(SwitchInput::classname(), ['disabled'=>true]);?>
        <p>Patreon role is managed by an integration. Please ask the user to ensure their patreon is linked.</p>
        <hr>
        <div>
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
        </div
    </div>
    <div class="col-md-1"></div>
</div>

<?php
ActiveForm::end();