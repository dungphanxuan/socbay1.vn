<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $mobile;
    public $company_name;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['email'], 'required'],
            [['subject'], 'required', 'message' => 'Vui lòng nhập tiêu đề'],
            [['name'], 'required', 'message' => 'Vui lòng tên của bạn'],
            [['body'], 'required', 'message' => 'Vui lòng nhập nội dung'],
            // We need to sanitize them
            [['name', 'subject', 'company_name', 'mobile', 'body'], 'filter', 'filter' => 'strip_tags'],
            // email has to be a valid email address
            ['mobile', 'string'],
            ['company_name', 'string'],
            ['email', 'email'],
            // verifyCode needs to be entered correctly

        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('frontend', 'Name'),
            'email' => Yii::t('frontend', 'Email'),
            'mobile' => Yii::t('frontend', 'Mobile'),
            'company_name' => Yii::t('frontend', 'Company Name'),
            'subject' => Yii::t('frontend', 'Subject'),
            'body' => Yii::t('frontend', 'Body'),
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            return Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom(Yii::$app->params['robotEmail'])
                ->setReplyTo([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();
        } else {
            return false;
        }
    }
}
