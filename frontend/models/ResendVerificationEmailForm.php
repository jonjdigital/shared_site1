<?php


namespace frontend\models;

use common\models\Profile;
use Yii;
use common\models\User;
use yii\base\Model;

class ResendVerificationEmailForm extends Model
{
    /**
     * @var string
     */
    public $email;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\common\models\User',
                'filter' => ['status' => User::STATUS_INACTIVE],
                'message' => 'There is no user with this email address.'
            ],
        ];
    }

    /**
     * Sends confirmation email to user
     *
     * @return bool whether the email was sent
     */
    public function sendEmail()
    {
        $user = User::findOne([
            'email' => $this->email,
            'status' => User::STATUS_INACTIVE
        ]);

        if ($user === null) {
            return false;
        }

        $profile = Profile::findOne(['user_id'=>$user->id]);

        return Yii::$app
            ->noreplyMailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user,'profile'=>$profile]
            )
            ->setFrom([Yii::$app->params['noreplyEmail'] => "Do Not Reply - JonJDigital"])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
