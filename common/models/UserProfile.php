<?php

namespace common\models;

use common\validators\PhoneValidator;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user_profile".
 *
 * @property integer $user_id
 * @property integer $bio
 * @property integer $locale
 * @property string $displayname
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property string $picture
 * @property string $avatar
 * @property string $avatar_path
 * @property string $avatar_base_url
 * @property integer $city_id
 * @property integer $district_id
 * @property integer $ward_id
 * @property integer $gender
 * @property string $phone
 * @property string $address
 * @property string $address2
 * @property string $url
 * @property string $company_name
 * @property string $facebook_url
 *
 * @property User $user
 */
class UserProfile extends ActiveRecord
{
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    /**
     * @var
     */
    public $picture;

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'picture' => [
                'class' => UploadBehavior::class,
                'attribute' => 'picture',
                'pathAttribute' => 'avatar_path',
                'baseUrlAttribute' => 'avatar_base_url'
            ]
        ];
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_profile}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'gender'], 'integer'],
            [['gender'], 'in', 'range' => [NULL, self::GENDER_FEMALE, self::GENDER_MALE]],
            [['avatar_path', 'avatar_base_url', 'address', 'url', 'facebook_url'], 'string', 'max' => 255],
            [['firstname', 'middlename', 'lastname', 'displayname', 'company_name'], 'string', 'min' => '2', 'max' => 32],
            [['phone'], 'string', 'max' => '14'],
            [['bio'], 'string'],
            [['city_id', 'district_id', 'ward_id'], 'integer'],
            ['phone', PhoneValidator::class],
            ['url', 'url', 'defaultScheme' => 'http'],
            ['locale', 'default', 'value' => Yii::$app->language],
            ['locale', 'in', 'range' => array_keys(Yii::$app->params['availableLocales'])],
            ['picture', 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('common', 'User ID'),
            'bio' => Yii::t('common', 'Bio'),
            'displayname' => Yii::t('common', 'Display Name'),
            'firstname' => Yii::t('common', 'Firstname'),
            'middlename' => Yii::t('common', 'Middlename'),
            'lastname' => Yii::t('common', 'Lastname'),
            'company_name' => Yii::t('common', 'Company name'),
            'locale' => Yii::t('common', 'Locale'),
            'picture' => Yii::t('common', 'Picture'),
            'gender' => Yii::t('common', 'Gender'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @return null|string
     */
    public function getFullName()
    {
        if ($this->displayname || $this->displayname) {
            return $this->displayname;
        }

        if ($this->firstname || $this->lastname) {
            return implode(' ', [$this->firstname, $this->lastname]);
        }
        $userInfo = $this->getUser();
        $userInfo = $userInfo->one();
        if ($userInfo) {
            return $userInfo->username;
        }

        return null;
    }

    public function getFullAddress()
    {
        return $this->address ? $this->address : 'Hà Nội';
    }

    /**
     * @param null $default
     * @return bool|null|string
     */
    public function getAvatar($default = null)
    {
        if (fileStorage()->getFilesystem()->has($this->avatar_path)) {
            return $this->avatar_path
                ? Yii::getAlias($this->avatar_base_url . '/' . $this->avatar_path)
                : $default;
        }

        return $default;
    }
}
