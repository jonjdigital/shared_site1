<?php

namespace common\models;

use PharIo\Manifest\Email;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

class EmailSettings extends ActiveRecord
{

    public static function tableName()
    {
        return "{{%email_settings}}";
    }

    public static function data(){
        $query = EmailSettings::find()->where(['active' => 1]);

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

// returns an array of Post objects
         return $provider;
    }
}