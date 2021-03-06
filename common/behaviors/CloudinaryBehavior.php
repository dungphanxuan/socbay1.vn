<?php

namespace common\behaviors;

use common\components\cloud\CloudinaryComponent;
use Yii;
use yii\base\Behavior;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;
use yii\db\AfterSaveEvent;
use yii\helpers\ArrayHelper;
use yii\validators\UrlValidator;
use yii\web\UploadedFile;

/**
 * Class CloudinaryBehavior
 * @package common\component\cloudinary
 * @property ActiveRecord $owner
 */
class CloudinaryBehavior extends Behavior
{

    const TYPE_FILE = 'file';
    const TYPE_URL = 'url';

    /** @var string */
    public $publicIdAttribute;
    /** @var string */
    public $attribute;
    /** @var array */
    public $attributes;
    /** @var string */
    public $publicId;
    /** @var array */
    public $thumbs;
    /** @var array */
    private $types = [];
    /** @var array */
    private $needToUpload = [];

    /** @var CloudinaryComponent */
    private $cloudinary;

    public function __construct(array $config = [])
    {
        $this->cloudinary = Yii::$app->cloudinary;
        parent::__construct($config);
    }

    /**
     * @throws InvalidConfigException
     */
    public function init()
    {
        if (null === $this->attribute) {
            throw new InvalidConfigException('attribute parameter must be set');
        }

        $this->attributes = explode(',', $this->attribute);

        parent::init();
    }

    /**
     * @return array
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_DELETE => 'beforeDelete',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
            ActiveRecord::EVENT_AFTER_INSERT => 'afterSave',
            ActiveRecord::EVENT_AFTER_UPDATE => 'afterSave',
        ];
    }

    public function beforeInsert($event)
    {
        foreach ($this->attributes as $attribute) {
            if (isset($this->owner->{$attribute}) && !empty($this->owner->{$attribute})) {
                $this->needToUpload[] = $attribute;
                $this->types[$attribute] = $this->getAttrType($attribute);
            }
        }
    }

    public function beforeUpdate($event)
    {
        //@TODO: Добавить проверку на изменение тегов, и если нужно, то обновить их тут, не обязательно обновляя картинку
        foreach ($this->attributes as $attribute) {
            if (isset($this->owner->dirtyAttributes[$attribute]) && !empty($this->owner->dirtyAttributes[$attribute])) {
                $this->needToUpload[] = $attribute;
                $this->types[$attribute] = $this->getAttrType($attribute);
            }
        }
    }

    private function getAttrType($attribute)
    {
        $file = UploadedFile::getInstance($this->owner, $attribute);
        if ($file) {
            return self::TYPE_FILE;
        }
        //@TODO: Add url validation
        return self::TYPE_URL;
    }

    /**
     * @param $event
     * @throws Exception
     */
    public function afterSave($event)
    {
        foreach ($this->needToUpload as $attribute) {
            $attributeType = ArrayHelper::getValue($this->types, $attribute);
            if (self::TYPE_FILE === $attributeType) {
                if (true === $this->uploadFile($attribute, true)) {
                    break;
                }
            } else if (self::TYPE_URL === $attributeType) {
                if (true === $this->uploadUrl($attribute, true)) {
                    break;
                }
            }
        }
    }

    /**
     * @param $event
     */
    public function beforeDelete($event)
    {
        foreach ($this->attributes as $attribute) {
            if (isset($this->owner->{$attribute}) && !empty($this->owner->{$attribute})) {
                $this->delete();
            }
        }
    }

    /**
     * @param      $attribute
     * @param bool $invalidate
     * @return bool
     */
    private function uploadFile($attribute, $invalidate = false)
    {
        /*$file = UploadedFile::getInstance($this->owner, $attribute);
        $toUpload = $file->tempName;*/
        $toUpload = $this->owner->getUploadPath($attribute);

        return $this->upload($toUpload, $invalidate);
    }

    /**
     * @param      $attribute
     * @param bool $invalidate
     * @return bool
     * @throws Exception
     */
    private function uploadUrl($attribute, $invalidate = false)
    {
        $toUpload = $this->owner->{$attribute};
        $urlValidator = new UrlValidator();
        if (!$urlValidator->validate($toUpload)) {
            //@TODO: Возможно и тут стоит не ошибку кидать, а инвалидировать модель
            throw new Exception('Error. ' . $attribute . ' must be an url');
        }

        return $this->upload($toUpload, $invalidate);
    }

    /**
     * @param      $toUpload
     * @param bool $invalidate
     * @return bool
     */
    private function upload($toUpload, $invalidate = false)
    {
        try {
            $info = $this->cloudinary->upload($toUpload, $this->getOptions($invalidate));
        } catch (\Cloudinary\Error $e) {
            //@TODO: Добавить эту проверку в валидацию модели
            return false;
        }
        if (null !== $this->publicIdAttribute) {
            $this->owner->{$this->publicIdAttribute} = ArrayHelper::getValue($info, 'public_id');
            $this->owner->save();
        }
        return true;
    }

    /**
     * @return bool|string
     */
    private function delete()
    {
        if (null !== $this->publicIdAttribute) {
            return $this->cloudinary->destroy($this->owner->{$this->$this->publicIdAttribute});
        }
        if ($this->getPublicId()) {
            return $this->cloudinary->destroy($this->getPublicId());
        }
        return false;
    }

    /**
     * @param bool $invalidate
     * @return array
     */
    private function getOptions($invalidate = false)
    {
        $options = [];
        if ($this->getPublicId()) {
            $options['public_id'] = $this->getPublicId();
        }
        //@TODO: Описать механизм получения тегов у модели
        if (isset($this->owner->tagNames)) {
            $options['tags'] = $this->owner->tagNames;
        }
        if ($invalidate) {
            $options['invalidate'] = true;
        }
        return $options;
    }

    /**
     * @return bool|string
     */
    private function getPublicId()
    {
        if (null === $this->publicId) {
            return false;
        }
        return $this->cloudinary->prefix . $this->resolvePath($this->publicId);
    }

    /**
     * @param string $path
     * @return string
     * Replaces all placeholders in path variable with corresponding values.
     */
    protected function resolvePath($path)
    {
        $model = $this->owner;
        return preg_replace_callback('/{([^}]+)}/', function ($matches) use ($model) {
            $name = $matches[1];
            $attribute = ArrayHelper::getValue($model, $name);
            if (is_string($attribute) || is_numeric($attribute)) {
                return $attribute;
            }

            return $matches[0];
        }, $path);
    }

    /**
     * @param string $name
     * @param string $format
     * @return string
     */
    public function getThumb($name, $format = '')
    {
        $config = ArrayHelper::getValue($this->thumbs, $name);
        return $this->cloudinary->getUrl($this->getPublicId(), $config) . ($format ? '.' . $format : '');
    }
}
