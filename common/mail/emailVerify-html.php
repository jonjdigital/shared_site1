<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $profile common\models\Profile */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
<div class="verify-email">
    <h1>Hello <?= Html::encode($profile->firstname) ?>,</h1>

    <p>Thank you for registering. Your username is as follows. Please use this to sign in to the site.</p>

    <h3> <?= Html::encode($user->username)?></h3>

    <p>Follow the link below to verify your email:</p>

    <p><?= Html::a(Html::encode($verifyLink), $verifyLink) ?></p>

    <p>Your password has been sent in a separate email for your security</p>
</div>
