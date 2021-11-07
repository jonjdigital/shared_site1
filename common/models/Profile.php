<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class Profile extends ActiveRecord{

    public static function tableName()
    {
        return "{{%profile}}";
    }
}