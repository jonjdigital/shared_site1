<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use manchenkov\yii\recaptcha\ReCaptchaWidget;
use \himiklab\yii2\recaptcha\ReCaptcha;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact col-lg-12">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <?php if(!Yii::$app->user->isGuest){?>
    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>


        <div class="col-md-6" id="socialContact">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-6">{image}</div><div class="col-lg-6">{input}</div></div>',
            ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

        <?php }else{ ?>
                <div class="col-md-6" id="social-contact">
            <p> Please send any business enquiries to the following email:</p>
            <h3><a href="mailto:jon.james@jonjdigital.com">jon.james@jonjdigital.com</a></h3>

        <?php } ?>
                    <br><br><h4>Or drop us a ticket via <a href="http://support.jonjdigital.com" target="_blank">support.jonjdigital.com                        </a></h4>
        </div>
<!--        <div class="col-md-2"></div>-->
        <div class="col-md-5" id="socialContact">
            <p style="text-align: center">You can also contact me on the below socials</p>
            <div class="fb-page" data-href="https://www.facebook.com/JonJDigital/" data-tabs="" data-width="600" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/JonJDigital/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/JonJDigital/">Jonjdigital</a></blockquote></div>
            <hr>
            <a href="https://twitter.com/JonJDigital?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-size="large" data-lang="en" data-show-count="false">Follow @JonJDigital</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            <hr>
            <iframe src="https://discord.com/widget?id=251756539457568772&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>        </div>
</div>