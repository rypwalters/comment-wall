<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Comments;

/**
 * ContactForm is the model behind the contact form.
 */
class CommentForm extends Comments
{
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name and comments are required
            ['name', 'required', 'message' => 'Please enter your name.'],
            ['comments', 'required', 'message' => 'Please enter a comment.'],
            
            // email has to be a valid email address
            ['email', 'email'],
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function comment($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        } else {
            return false;
        }
    }
}
