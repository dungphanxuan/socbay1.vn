<?php

namespace api\controllers;

use api\components\AccessTokenAuth;
use backend\models\search\FileStorageItemSearch;
use common\models\FileStorageItem;
use Filestack\Filelink;
use Filestack\FilestackClient;
use Google\Cloud\Storage\StorageClient;
use Intervention\Image\ImageManagerStatic;
use trntv\filekit\actions\UploadAction;
use trntv\filekit\File;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * FileStorageController implements the CRUD actions for FileStorageItem model.
 * Thumb Upload Upload Copy To Another Size
 */
class FileStorageController extends ApiController
{
    public function behaviors()
    {
        return \yii\helpers\ArrayHelper::merge(parent::behaviors(), [
            'verbs'         => [
                'class'   => VerbFilter::class,
                'actions' => [
                    'delete'        => ['post'],
                    'upload-delete' => ['delete'],
                ],
            ],
            'authenticator' => [
                'class'  => AccessTokenAuth::class,
                'except' => ['index', 'view'],
            ]
        ]);
    }


    public function actions()
    {
        return [
            'upload'        => [
                'class'       => \trntv\filekit\actions\UploadAction::class,
                'deleteRoute' => 'upload-delete'
            ],
            'upload-delete' => [
                'class' => 'trntv\filekit\actions\DeleteAction'
            ],
            'thumb-upload'  => [
                'class'        => UploadAction::class,
                'deleteRoute'  => 'upload-delete',
                'on afterSave' => function ($event) {
                    /* @var $file \League\Flysystem\File */
                    $file = $event->file;
                    $metaData = $file->getMetadata();
                    //Backup File
                    $content = $file->read();
                    $img = ImageManagerStatic::make($file->read())->fit(320, 240);
                    $file->update($img->encode());
                    $thumbPath = 'thumb/' . $metaData['path'];
                    $file->copy($thumbPath);
                    //Revert File
                    $file->update($content);
                }
            ],
        ];
    }

    /*
    * Action Upload File For Froala WYSIWYG HTML Editor
    *
    * @param file $file
    *
    * @return file infor
    * */
    public function actionUploadFile()
    {
        //var_dump($_POST);
        //dd($_FILES);
        // Get file link
        $fileParam = 'file';
        $fileInstance = UploadedFile::getInstanceByName($fileParam);
        if (!$fileInstance) {
            $this->code = 422;
            $this->msg = 'Missing file';
        } else {
            $filePath = Yii::$app->fileStorage->save($fileInstance);
            $baseUrl = Yii::$app->fileStorage->baseUrl;

            $imageUrl = $baseUrl . '/' . $filePath;
            $fileStorage = Yii::$app->fileStorage;

            // Response data
            if ($filePath) {
                $model = new FileStorageItem();
                $model->component = 'fileStorage';
                $model->path = $filePath;
                $model->base_url = $fileStorage->baseUrl;
                $model->size = '';
                $model->type = '';
                $model->name = '';

                $model->save(false);

                //TOTO: Check safe file

                $this->code = 200;
                $this->msg = 'Upload Success';
                $this->data = [
                    'id'  => $model->id,
                    'url' => $imageUrl,
                ];
            } else {
                $this->code = 403;
                $this->msg = 'Upload Error';
            }
        }
    }

    public function actionUploadGoogleCloud()
    {
        $keyFilePath = getStoragePath() . '\key\YiiGroup-797194353469.json';
        $storage = new StorageClient([
            'projectId' => 'valued-ceiling-167301',
            'keyFile'   => json_decode(file_get_contents($keyFilePath), true)

        ]);
        $bucket = $storage->bucket('yii_bucket');

        $fileParam = 'file';
        $fileInstance = UploadedFile::getInstanceByName($fileParam);
        $fileObj = File::create($fileInstance);

        //dd($fileInstance);

        $filename = implode('.', [
            date('d') . Yii::$app->security->generateRandomString(),
            $fileObj->getExtension()
        ]);
        $filePath = implode('/', [1, date('mY'), $filename]);

        // Using Predefined ACLs to manage object permissions, you may
        // upload a file and give read access to anyone with the URL.
        $bucket->upload(
            fopen($fileInstance->tempName, 'r'),
            [
                'name'          => $filePath,
                'predefinedAcl' => 'publicRead'
            ]
        );

        $baseUrl = 'https://storage.googleapis.com/yii_bucket/';
        $imageUrl = $baseUrl . $filePath;
        $res = ['link' => $imageUrl];

        // Response data
        Yii::$app->response->format = Yii::$app->response->format = Response::FORMAT_JSON;

        return $res;
    }
}
