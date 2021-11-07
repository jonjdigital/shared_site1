<?php

namespace common\models;

use yii\base\Model;
use PHPMailer\PHPMailer\PHPMailer;



class Emails extends Model{



    public static function emailNewUser($toEmail,$msg,$subject){
        $emailSettings = EmailSettings::find()->where(['email_module'=>"admin"])->one();
        $contactEmail = EmailSettings::find()->where(['email_module'=>"contact"])->one();

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.office365.com";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->port = 587;
        $mail->Username = $emailSettings->login_email;
        $mail->Password = $emailSettings->password;
        $mail->setFrom($emailSettings->login_email,$emailSettings->sender_name);
        $mail->addReplyTo($contactEmail->login_email,$contactEmail->sender_name);
        $mail->addAddress($toEmail);
        $mail->msgHTML($msg);
        $mail->html2text($msg);
        $mail->Subject = $subject;

        if ($mail->send()){
            return true;
        }else{
            return false;
        }
    }

    public static function emailContact($model){
        $emailSettings = EmailSettings::find()->where(['email_module'=>"contact"])->one();
        $adminEmail = EmailSettings::find()->where(['email_module'=>"admin"])->one();

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.office365.com";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->port = 587;
        $mail->Username = $emailSettings->login_email;
        $mail->Password = $emailSettings->password;
        $mail->setFrom($emailSettings->login_email,$emailSettings->sender_name);
        $mail->addReplyTo($model->email, $model->name);
        $mail->addCC("jon.james@jonjdigital.com",'Jon James');
        $mail->addCC($adminEmail->login_email,$adminEmail->sender_name);
        $mail->addAddress($emailSettings->login_email);
        $mail->msgHTML($model->body);
        $mail->html2text($model->body);
        $mail->Subject = $model->subject;

        if ($mail->send()){
            return true;
        }else{
            return false;
        }
    }


}