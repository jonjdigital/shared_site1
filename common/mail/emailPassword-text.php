<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
Hello <?= Html::encode($profile->firstname) ?>,

Thank you for registering.

Please find below your password for <?= Yii::$app->params['siteName']?>

Your password is: <?= $password ?>

