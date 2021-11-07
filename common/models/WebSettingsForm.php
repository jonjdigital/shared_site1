<?php

namespace common\models;

use common\models\WebSettings;
use yii\base\Model;

class WebSettingsForm extends Model{

    public $site_name;
    public $site_suffix;

    public function rules()
    {
        return [
            [['site_name','site_suffix'],'required'],
            [['site_name','site_suffix'],'string'],
        ];
    }
}