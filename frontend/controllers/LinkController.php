<?php

namespace frontend\controllers;

use common\models\ApiConnectors;
use yii\filters\AccessControl;
use yii\web\Controller;
use Patreon\API;
use Patreon\OAuth;

class LinkController extends Controller{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['patreon'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionPatreon($code,$state){

        $client_id = ApiConnectors::patreon_client_id;
        $client_secret = ApiConnectors::patreon_client_secret;
        $redirect_uri =  ApiConnectors::patreon_redirect;

        if ( $code != '' ) {

            $oauth_client = new OAuth($client_id, $client_secret);

            $tokens = $oauth_client->get_tokens($code, $redirect_uri);

//            $access_token = $tokens['access_token'];
//            $refresh_token = $tokens['refresh_token'];

            // Here, you should save the access and refresh tokens for this user somewhere. Conceptually this is the point either you link an existing user of your app with his/her Patreon account, or, if the user is a new user, create an account for him or her in your app, log him or her in, and then link this new account with the Patreon account. More or less a social login logic applies here.

            // Only use user's email address info coming from Patreon if the email is verified. Check for is_email_verified value in user's API return.

            return $this->render('patreon',['code'=>$code,'tokens'=>$tokens]);
        }
    }
}