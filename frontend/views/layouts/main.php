<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;
use common\models\WebSettings;

$siteName = WebSettings::find()->where(['setting'=>"site_name"])->one()->value;
$siteSuffix = WebSettings::find()->where(['setting'=>"site_suffix"])->one()->value;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0" nonce="a359OO9N"></script>
<html lang="<?= Yii::$app->language ?>">
<?php include "header.php" ?>
<body>
<?php $this->beginBody() ?>

<div class="row sloganHeader">
    <div class="row">
        <div class="col-md-2">
            <?= Breadcrumbs::widget([
                'id' => 'breadcrumbsWidget',
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </div>
        <div class="col-md-8">
        <h1><?php echo Html::a($siteName."<br>".$siteSuffix, Url::home(),['id'=>'homeLink'])?></h1>
        </div>
        <div class="col-md-2"></div>
    </div>

    <div class="row navigationHeader">
        <div class="col-lg-3"></div>
        <div class="col-lg-3">
            <?php include "siteNav.php"?>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-2">
            <?php include "userNav.php"?>
        </div>
    </div>
</div>

<div class="wrap">
    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode($siteName) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
