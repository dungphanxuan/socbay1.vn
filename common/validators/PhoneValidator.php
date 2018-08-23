<?php

namespace common\validators;

use common\helpers\PhoneNumber;
use Yii;
use yii\base\NotSupportedException;
use yii\validators\Validator;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class PhoneValidator extends Validator
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = Yii::t('common', '"{attribute}" must be a valid Phone');
        }
    }

    /**
     * @inheritdoc
     */
    public function validateValue($value)
    {
        throw new NotSupportedException(get_class($this) . ' does not support validateValue().');
    }

    /**
     * @inheritdoc
     */
    public function clientValidateAttribute($model, $attribute, $view)
    {
        return null;
    }

    public function validateAttribute($model, $attribute)
    {
        if (!PhoneNumber::detect_number($model->$attribute)) {
            $this->addError($model, $attribute, 'The phone number must be valid Phone.');
        }
    }
}
