<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="verify-email">
    <h1>Hello <?= Html::encode($profile->firstname) ?>,</h1>

    <p>Thank you for registering.</p>

    <p>Please find below your password for <?= Yii::$app->params['siteName']?></p>

    <p>Your password is: <?php echo $password ?></p>
</div>
