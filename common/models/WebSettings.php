<?php

namespace common\models;

use Yii;
Use yii\db\ActiveRecord;

class WebSettings extends ActiveRecord{

    public static function tableName()
    {
        return "{{%web_settings}}";
    }

    public static function getSiteName(){
        return  WebSettings::find()->where(['setting'=>"site_name"])->one()->value;
    }
    public static function getSiteSuffix(){
        return  WebSettings::find()->where(['setting'=>"site_suffix"])->one()->value;
    }

}