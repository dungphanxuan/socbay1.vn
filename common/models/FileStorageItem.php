<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%file_storage_item}}".
 *
 * @property integer $id
 * @property string  $component
 * @property string  $base_url
 * @property string  $path
 * @property string  $type
 * @property integer $size
 * @property string  $name
 * @property integer $is_safe
 * @property integer $created_by
 * @property string  $upload_ip
 * @property integer $created_at
 */
class FileStorageItem extends ActiveRecord
{
    public $image;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%file_storage_item}}';
    }

    public function behaviors()
    {
        return [
            [
                'class'              => TimestampBehavior::class,
                'updatedAtAttribute' => false
            ],
            [
                'class'              => BlameableBehavior::class,
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'created_by',
            ],

        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['component', 'path'], 'required'],
            [['size', 'is_safe', 'created_by'], 'integer'],
            [['component', 'name', 'type'], 'string', 'max' => 255],
            [['path', 'base_url'], 'string', 'max' => 1024],
            [['type'], 'string', 'max' => 45],
            [['upload_ip'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => Yii::t('common', 'ID'),
            'component'  => Yii::t('common', 'Component'),
            'base_url'   => Yii::t('common', 'Base Url'),
            'path'       => Yii::t('common', 'Path'),
            'type'       => Yii::t('common', 'Type'),
            'size'       => Yii::t('common', 'Size'),
            'name'       => Yii::t('common', 'Name'),
            'is_safe'    => Yii::t('common', 'Safe Image'),
            'created_by' => Yii::t('common', 'User Id'),
            'upload_ip'  => Yii::t('common', 'Upload Ip'),
            'created_at' => Yii::t('common', 'Created At')
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /*
     * @return string
     * */
    public function getImage()
    {
        $url = $this->base_url . '/' . $this->path;
        //Local
        if ($this->component == 'fileStorage') {
            $hasPath = fileSystem()->has($this->path);
            $path = 'image/logo_square.png';
            if ($this->path && $hasPath) {
                $path = $this->path;
            }
            $signConfig = [
                'glide/index',
                'path' => $path,
                'w'    => '230',
                'h'    => '110',
                'fit'  => 'crop'
            ];

            $url = Yii::$app->glide->createSignedUrl($signConfig);
        }

        return $url;
    }

    /*
     * @return string
     * */
    public function getThumbImage($type = 1)
    {

    }

    public static function getListComponent($update = false)
    {
        $key = [
            FileStorageItem::class,
            'c'
        ];
        $data = dataCache()->get($key);

        if ($data === false || $update) {
            // $data is not found in cache, calculate it from scratch
            $data = \yii\helpers\ArrayHelper::map(
                FileStorageItem::find()->select('component')->distinct()->all(),
                'component',
                'component'
            );
            //distinct remover duplicate record
            // store $data in cache so that it can be retrieved next time
            dataCache()->set($key, $data);
        }

        return $data;
    }

    /*
     * Save FileStorageItem
     * */
    public static function saveItem($data)
    {
        $model = new FileStorageItem();
        $model->component = 'type';
        $model->path = $data['path'];
        $model->base_url = $data['base_url'];
        $model->size = $data['metaData']['size'];
        $model->type = $data['metaData']['mimetype'];
        $model->name = $data['metaData']['filename'];
        if (Yii::$app->request->getIsConsoleRequest() === false) {
            $model->upload_ip = Yii::$app->request->getUserIP();
        }
        $model->save(false);

        return true;
    }

    public function safeImage($safe = true)
    {
        //Image Not Safe
        if (!$safe) {
            if (fileSystem()->has($this->path)) {
                fileSystem()->copy($this->path, 'spam\\' . $this->path);
                fileSystem()->delete($this->path);
            }
        }
    }
}
