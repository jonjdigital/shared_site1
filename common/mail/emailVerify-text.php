<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $profile common\models\Profile */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
Hello <?= Html::encode($profile->firstname) ?>,

Thank you for registering. Your username is as follows. Please use this to sign in to the site.

<?= Html::encode($user->username)?>

Follow the link below to verify your email:

<?= Html::a(Html::encode($verifyLink), $verifyLink) ?>

Your password has been sent as a separate email for your security.
