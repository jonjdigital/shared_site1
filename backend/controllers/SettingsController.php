<?php

namespace backend\controllers;

use common\models\EmailSettings;
use common\models\WebSettingsForm;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use common\models\AccessRights;
use Yii;
use common\models\WebSettings;
use yii\web\ForbiddenHttpException;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;


class SettingsController extends Controller{

    public function actionIndex(){
        if(!AccessRights::isModerator()){
            return $this->redirect('@frontURL');
        }
        if(!AccessRights::isSiteAdmin()){
            throw new ForbiddenHttpException('Only site admins have access to this page. Please contact Jon if you think this is in error');
        }

        //get Web Settings
        $siteName = WebSettings::find()->where(['setting'=>'site_name'])->one();
        $siteSuffix = WebSettings::find()->where(['setting'=>'site_suffix'])->one();

        //get Email Settings to display
        $emails = EmailSettings::data();

        $model = new WebSettingsForm();
        if ($model->load(Yii::$app->request->post())){
            $post = $_POST['WebSettingsForm'];
            //update name
            $siteName->value = $post['site_name'];
            $siteName->save('false');
            //update suffix
            $siteSuffix->value = $post['site_suffix'];
            $siteSuffix->save('false');
        }

        return $this->render('index',
            [
                'model' => $model,
                'data' => $emails,
            ]);
    }

    public function actionSmtp($module){
        if(!AccessRights::isModerator()){
            return $this->redirect('@frontURL');
        }
        $model = EmailSettings::find()->where(['email_module'=>$module])->one();
        if(!AccessRights::isSiteAdmin()){
            throw new ForbiddenHttpException('Only site admins have access to this page. Please contact Jon if you think this is in error');
        }
        if(!$model) {
            throw new NotFoundHttpException('Error: `Module` not valid');
        }
        return $this->render('smtp',['model'=>$model,'module'=>$module]);
    }

}