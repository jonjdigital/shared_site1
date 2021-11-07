<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class AccessRights extends ActiveRecord
{

    public static function tableName()
    {
        return "{{%access_rights}}";
    }

    public function attributeLabels()
    {
        return [
            'admin' => "Admin Role",
            'editor' => "Site Editor",
            'patron' => "Patreon Member"
            ];
    }

    public static function getRights($id){
        return AccessRights::find()->where(['user_id'=>$id])->one();
    }

    public static function isSiteAdmin(){
        if (!Yii::$app->user->isGuest) {
            $id = Yii::$app->user->id;
            $ar = AccessRights::getRights($id);
            if ($ar['site_admin'] === 1) {
                return true;
            } else {
                return false;
            }
        }
    }
    public static function isAdmin(){
        if (!Yii::$app->user->isGuest) {
            $id = Yii::$app->user->id;
            $ar = AccessRights::getRights($id);
            if ($ar['admin'] === 1 || $ar['site_admin']) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function isModerator()
    {
        if (!Yii::$app->user->isGuest) {
            $id = Yii::$app->user->id;
            $ar = AccessRights::getRights($id);
            if ($ar['admin'] === 1 || $ar['moderator'] === 1 || $ar['site_admin'] === 1) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function getAdminValue($id){
        $rights = AccessRights::find()->where(['user_id'=>$id])->one();
        if($rights->site_admin == 1) return "Site Admin";
        if($rights->admin == 1) return "Admin";
        if($rights->moderator == 1) return "Moderator";
        return "None";
    }


}