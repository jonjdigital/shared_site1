<?php

namespace common\models;

use yii\db\ActiveRecord;

class SocialProfiles extends ActiveRecord{

    public static function tableName()
    {
        return "{{%social_links}}";
    }

    public static function getProfiles($id){
        return SocialProfiles::find()->where(['user_id'=>$id])->one();
    }

    public static function getPatreonLoginLink(){
        $client_id = ApiConnectors::patreon_client_id;
        $client_secret = ApiConnectors::patreon_client_secret;
        $redirect_uri =  ApiConnectors::patreon_redirect;

        $href = 'https://www.patreon.com/oauth2/authorize?response_type=code&client_id=' . $client_id . '&redirect_uri=' . urlencode($redirect_uri);

        $state = array();
        $state['final_page'] = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/link/patreon';
        $state_parameters = '&state=' . urlencode( base64_encode( json_encode( $state ) ) );

        $href .= $state_parameters;

        return $href;
    }
}