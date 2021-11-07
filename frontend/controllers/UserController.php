<?php

namespace frontend\controllers;

use common\models\AccessRights;
use Yii;
use common\models\User;
use common\models\Profile;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class UserController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionView($id){
        $user = User::findOne(['id'=>$id]);
        $profile = Profile::findOne(['user_id'=>$id]);

        //get roles and place them in array
        $roles = [];
        $ar = AccessRights::findOne(['user_id' => $id]);
        if($ar['site_admin'] == 1) $roles[] = "Website Admin";
        if($ar['admin'] == 1) $roles[] = "Admin";
        if($ar['moderator'] == 1) $roles[] = "Moderator";
        if($ar['editor'] == 1) $roles[] = "Editor";
        if($ar['patron'] == 1) $roles[] = "Patreon";

        return $this->render('/user/view',['user'=>$user,'profile'=>$profile,'roles'=>$roles]);
    }

    public function actionUpdate($id){
        if(!((Yii::$app->user->id) || AccessRights::isAdmin())) {
            throw new ForbiddenHttpException("This page is restricted. Please contact an admin if you believe this to be in error!");
        }

        $model = user::find()->where(['id' => $id])->one();
        $profile = Profile::find()->where(['user_id'=>$id])->one();


        if($model->load(Yii::$app->request->post())) {
            $post = $_POST['User'];
            if (strtolower($post['username']) !== strtolower($post['display_name'])) {
                Yii::$app->session->setFlash('error', 'Your display name must match your username.');
            } else {

                $model->username = $post['username'];
                $model->display_name = $post['display_name'];
                $model->email = $post['email'];

                $model->save();
                Yii::$app->session->setFlash('success', 'You have successfully updated your user details!');
            }
        }

        if($profile->load(Yii::$app->request->post())) {
            $post = $_POST['Profile'];

            $profile->firstname = $post['firstname'];
            $profile->lastname = $post['lastname'];

            $profile->save();
            Yii::$app->session->setFlash('success', 'You have successfully updated your profile details!');

        }

        return $this->render('update',['model'=>$model,'profile'=>$profile]);

    }

}