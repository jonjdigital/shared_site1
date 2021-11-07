<?php
use yii\helpers\Html;
use common\models\WebSettings;

$siteName = WebSettings::find()->where(['setting'=>"site_name"])->one()->value;
$siteSuffix = WebSettings::find()->where(['setting'=>"site_suffix"])->one()->value;

?>

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($siteName." - ".$siteSuffix) ?></title>
    <?php $this->head() ?>
    <script data-ad-client="ca-pub-1018236555298980" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
