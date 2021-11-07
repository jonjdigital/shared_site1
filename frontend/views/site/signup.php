<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \backend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">


    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <h1><?= Html::encode($this->title) ?></h1>
            <br><!--
            <p>As this site is a One Man Job, I have decided to make this site invite-only for users, or if you have a patreon subscription to me.</p>

            <p>If you would like to request access, please drop me an email to <?/*= Html::mailto(Yii::$app->params['supportEmail'],Yii::$app->params['supportEmail'])*/?> or drop me a message from my <?/*= Html::a('contact page',['site/contact'])*/?></p>-->
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>"Insanely cool username...."]) ?>
                <?= $form->field($model, 'display_name')->textInput(['placeholder'=>"Change your usernames capitalisation...."]) ?>

                <?= $form->field($model, 'email')->input('email',['placeholder'=>"joe@bloggs.com"]) ?>
                <?= $form->field($model, 'firstname')->textInput(['placeholder'=>"Joe"]) ?>
                <?= $form->field($model, 'lastname')->textInput(['placeholder'=>"Bloggs"])  ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder'=>"Super secure password...."]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
