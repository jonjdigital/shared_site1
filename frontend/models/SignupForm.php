<?php
namespace frontend\models;

use common\models\Emails;
use common\models\Profile;
use common\models\AccessRights;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $display_name;

    public $firstname;
    public $lastname;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'display_name'], 'trim'],
            [['username', 'display_name'], 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            [['username', 'display_name'], 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            [['firstname','lastname'], 'required'],

        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        if(strtolower($this->username) === strtolower($this->display_name)) {

            //create base user
            $user = new User();
            $user->username = strtolower($this->username);
            $user->display_name = $this->display_name;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->generateEmailVerificationToken();
            $user->save();

            //create profile link for user
            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->firstname = $this->firstname;
            $profile->lastname = $this->lastname;
            $profile->save();

            //create access rights link for user
            $ar = new AccessRights();
            $ar->user_id = $user->id;
            $ar->save();

            //send relevant emails
//            $this->sendEmail($user, $profile);
            $msg = Yii::$app->view->renderFile('@common/mail/emailVerify-html.php',['user'=>$user,'profile'=>$profile]);
            Emails::emailNewUser($user->email,$msg,"Welcome to JonJDigital");

            $msg1 = Yii::$app->view->renderFile('@common/mail/emailPassword-html.php',['password'=>$this->password,'profile'=>$profile]);
            Emails::emailNewUser($user->email,$msg1,"Password for JonJDigital");

            //generate first login password reset
            $user->generatePasswordResetToken();

        }else{
            Yii::$app->session->setFlash('error','Your display name must match your username.');
        }
    }

}