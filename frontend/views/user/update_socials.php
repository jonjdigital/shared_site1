<?php

use yii\helpers\Html;
use common\models\SocialProfiles;
use common\models\ApiConnectors;

//get social profiles linked to the user
$id = $_GET['id'];
$socials = SocialProfiles::getProfiles($id);
$patreon_link = SocialProfiles::getPatreonLoginLink();
var_dump($patreon_link);
?>

<h1>Social Profiles</h1>

<div class="row social-profile" id="twitch">
    <div class="col-md-2" id="twitch-logo">
        <?php if($socials->twitch_id == 0){?>
            <a href="https://twitch.tv" target="_blank">
                <?= Html::img(Yii::getAlias('@web/uploads/website/twitch_purple.png'),['style' => 'width:96px; height: 96px']) ?>
            </a>
        <?php }?>
    </div>
    <div class="col-md-10" id="twitch-info">
        <h4>Twitch:</h4><br>
        <?php if($socials->twitch_id == 0){?>
            Account Not Linked <br>
            <?php if($id == Yii::$app->user->id){?>
                <button class="btn btn-primary">Link Twitch</button>
                <?php }?>
        <?php }?>
    </div>
</div><br>
<div class="row social-profile" id="discord">
    <div class="col-md-2" id="discord-logo">
        <?php if($socials->twitch_id == 0){?>
            <a href="https://discord.com" target="_blank">
                <?= Html::img(Yii::getAlias('@web/uploads/website/discord.png'),['style' => 'width:96px; height: 96px']) ?>
            </a>
        <?php }?>
    </div>
    <div class="col-md-10" id="discord-info">
        <h4>Discord:</h4><br>
        <?php if($socials->discord_id == 0){?>
            Account Not Linked <br>
            <?php if($id == Yii::$app->user->id){?>
                <button class="btn btn-primary">Link Discord</button>
            <?php }?>
        <?php }?>
    </div>
</div><br>
<div class="row social-profile" id="patreon">
    <div class="col-md-2" id="patreon-logo">
        <?php if($socials->twitch_id == 0){?>
            <a href="https://www.patreon.com/creator-home" target="_blank">
                <?= Html::img(Yii::getAlias('@web/uploads/website/patreon_coral.png'),['style' => 'width:96px; height: 96px']) ?>
            </a>
        <?php }?>
    </div>
    <div class="col-md-10" id="patreon-info">
        <h4>Patreon:</h4><br>
        <?php if($socials->discord_id == 0){?>
            Account Not Linked <br>
            <?php if($id == Yii::$app->user->id){?>
                <a href="<?=$patreon_link?>"><button class="btn btn-primary">Link Patreon</button></a>
            <?php }?>
        <?php }?>
    </div>
</div>

<br><br>
<p>Legal Bits:</p>
<p>The Discord logo is registered property of Discord Inc. I do not and will not claim that this logo is my work, and all rights belong to Discord Inc. TWITCH, the TWITCH Logo, the Glitch Logo, and/or TWITCHTV are trademarks of Twitch Interactive, Inc. or its affiliates. Find out more
    <a href="https://www.twitch.tv/p/en/legal/trademark/">here</a>. The “Patreon” Wordmark and the "P" Logo (together, the “Patreon Marks”) are trademarks registered by Patreon, Inc. in the U.S. Patent and Trademark Office. The Patreon Marks are also registered trademarks, trademarks or trade dress of Patreon, Inc. in other countries. Find out more
    <a href="https://www.patreon.com/brand">here</a></p>