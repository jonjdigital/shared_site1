<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'About JonJDigital';
$this->params['breadcrumbs'][] = $this->title;

$path = Yii::getAlias('@web/uploads/website/img1.png');

//date in mm/dd/yyyy format; or it can be in other formats as well
$birthDate = "03/01/2000";
//explode the date to get month, day and year
$birthDate = explode("/", $birthDate);
//get age from date or birthdate
$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));

?>
<div class="site-about">
    <h1 class="settings-title">About JonJDigital</h1>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <?= Html::img($path,['style' => 'width:300px; height: 300px']) ?>
        </div>
        <div class="col-md-8">
            <h4>Name: Jon James <br>
                Nationality: White British <br>
                Pronouns: He/Him <br>
                Date of Birth: 1st March 2000 - <?=$age?> years old <br>
            <br>
            I am a small content creator, with a dream of creating a community where everyone can be themselves, without the worry of anyone harassing them. I stream on Twitch, and am starting to look into other content platforms.
                <br><br>
                I am also a hobbyist Web Developer, and i have created this website by hand, in my free time.
            </h4>
        </div>
    </div>
</div>
