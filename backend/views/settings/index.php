<?php

use common\models\WebSettings;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\helpers\Url;
?>
<div class="settings">
    <h2 class="settings-title">Website Settings</h2>
    <hr>
<?php
$form = ActiveForm::begin([
    'id'=>"web_settings"
    ]);
    ?>
    <h4>Branding:</h4><br>
    <?= $form->field($model,'site_name')->textInput(['value'=>WebSettings::getSiteName()]); ?>
    <?= $form->field($model,'site_suffix')->textInput(['value'=>WebSettings::getSiteSuffix()]); ?>
    <hr>
    <?= Html::submitButton('Save Changes', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
    <hr>
    <h4>Email Settings</h4>
    <?php

    echo GridView::widget([
            'dataProvider' => $data,
        'columns' => [
            [
                    'label' => 'Module',
                'value' => function($data){
    return ucfirst($data->email_module);
                }
            ],
            [
                    'label' => 'Email',
                'value' => function($data){
    return $data->login_email;
                }
            ],
            [
                    'label' => 'Display Name',
                'value' => function($data){
    return $data->sender_name;
                }
            ],
            [
                    'label' => 'Edit',
                'content' => function($data){
        return Html::a('Edit',Url::to(['/settings/smtp','module'=>$data->email_module]));
            },
            ]
        ]
    ]);

    ?>



</div>
<?php
ActiveForm::end();
