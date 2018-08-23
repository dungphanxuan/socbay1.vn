<?php

namespace backend\controllers;

use backend\models\search\FileStorageItemSearch;
use common\components\filesystem\actions\CloudinaryDeleteAction;
use common\components\filesystem\actions\CloudinaryUploadAction;
use common\components\filesystem\actions\FilestackUploadAction;
use common\components\filesystem\actions\LocalUploadAction;
use common\components\filesystem\actions\StorageUploadAction;
use common\components\filesystem\actions\FilestackDeleteAction;
use common\components\filesystem\actions\StorageDeleteAction;
use common\models\FileStorageItem;
use Filestack\Filelink;
use Filestack\FilestackClient;
use Google\Cloud\Storage\StorageClient;
use Intervention\Image\ImageManagerStatic;
use trntv\filekit\actions\UploadAction;
use trntv\filekit\File;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * FileStorageController implements the CRUD actions for FileStorageItem model.
 * Thumb Upload Upload Copy To Another Size
 */
class FileStorageController extends BackendController
{
    public function behaviors()
    {
        return \yii\helpers\ArrayHelper::merge(parent::behaviors(), [
            'verbs' => [
                'class'   => VerbFilter::class,
                'actions' => [
                    'delete'        => ['post'],
                    'upload-delete' => ['delete'],
                ],
            ],
        ]);
    }


    public function actions()
    {
        return [
            'upload'                  => [
                'class'       => LocalUploadAction::class,
                'deleteRoute' => 'upload-delete'
            ],
            'upload-gcloud'           => [
                'class'       => \trntv\filekit\actions\UploadAction::class,
                'deleteRoute' => 'upload-delete-gcloud',
                'fileStorage' => 'fileStorageGCloud'
            ],
            'upload-filestack-action'  => [
                'class'       => FilestackUploadAction::class,
                'deleteRoute' => 'upload-delete-filestack',
                'base_url'    => 'https://cdn.filestackcontent.com',
            ],
            'upload-storage'           => [
                'class'       => StorageUploadAction::class,
                'deleteRoute' => 'upload-delete-storage',
                'base_url'    => 'https://storage.googleapis.com/century-estate.appspot.com',
            ],
            'upload-cloudinary'        => [
                'class'       => CloudinaryUploadAction::class,
                'deleteRoute' => 'upload-delete-cloudinary',
                'base_url'    => 'https://res.cloudinary.com/dfeqcehdw/image/upload',
            ],
            'upload-delete'            => [
                'class' => \trntv\filekit\actions\DeleteAction::class
            ],
            'upload-delete-storage'    => [
                'class' => StorageDeleteAction::class
            ],
            'upload-delete-filestack'  => [
                'class' => FilestackDeleteAction::class
            ],
            'upload-delete-cloudinary' => [
                'class' => CloudinaryDeleteAction::class
            ],
            'upload-delete-gcloud'     => [
                'class'       => 'trntv\filekit\actions\DeleteAction',
                'fileStorage' => 'fileStorageGCloud'
            ],
            'upload-imperavi'          => [
                'class'            => 'trntv\filekit\actions\UploadAction',
                'fileparam'        => 'file',
                'responseUrlParam' => 'filelink',
                'multiple'         => false,
                'disableCsrf'      => true
            ],
            'thumb-upload'            => [
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

    /**
     * Lists all FileStorageItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FileStorageItemSearch();

        $params = Yii::$app->request->queryParams;
        $dataProvider = $searchModel->search($params);
        $dataProvider->sort = [
            'defaultOrder' => ['created_at' => SORT_DESC]
        ];
        /* $components = \yii\helpers\ArrayHelper::map(
             FileStorageItem::find()->select('component')->distinct()->all(),
             'component',
             'component'
         );*/
        $components = FileStorageItem::getListComponent();
        //dd($components);
        $querySum = FileStorageItem::find();
        $componentName = ArrayHelper::getValue($params, 'FileStorageItemSearch.component');
        if ($componentName) {
            $querySum->andWhere(['component' => $componentName]);
        }
        $totalSize = $querySum->sum('size') ?: 0;

        $dataProvider->pagination->pageSize = 100;

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            'components'   => $components,
            'totalSize'    => $totalSize
        ]);
    }

    /**
     * Displays a single FileStorageItem model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id)
        ]);
    }

    public function actionFileUpload()
    {
        return $this->render('upload', [
        ]);
    }

    /*
    * Action Upload File For Froala WYSIWYG HTML Editor
    *
    * @param file $file
    *
    * @return file infor
    * */
    public function actionUploadFroala()
    {
        //var_dump($_POST);
        //dd($_FILES);
        // Get file link
        $fileParam = 'file';
        $fileInstance = UploadedFile::getInstanceByName($fileParam);
        $filePath = Yii::$app->fileStorage->save($fileInstance);
        $baseUrl = Yii::$app->fileStorage->baseUrl;

        $imageUrl = $baseUrl . '/' . $filePath;
        $res = ['link' => $imageUrl];

        // Response data
        Yii::$app->response->format = Yii::$app->response->format = Response::FORMAT_JSON;

        return $res;
    }

    public function actionFileFroala()
    {
        $dataFileItem = FileStorageItem::find()
            ->limit(10)
            ->orderBy('id desc')
            ->all();
        $dataImage = [];
        /** @var FileStorageItem $item */
        foreach ($dataFileItem as $item) {
            if (Yii::$app->fileStorage->getFilesystem()->has($item->path)) {
                $dataDetail = [];
                $dataDetail['url'] = $item->base_url . '/' . $item->path;
                $dataImage [] = $dataDetail;
            }
        }

        $res = $dataImage;
        // Response data
        Yii::$app->response->format = Yii::$app->response->format = Response::FORMAT_JSON;

        return $res;
    }

    /*
     * FileStack Upload
     * */
    public function actionUploadFilestack()
    {
        // Get file link
        $fileName = 'file';
        $logoFile = UploadedFile::getInstanceByName($fileName);

        $client = new FilestackClient('AMKHHcdTF25H9V360VQhez');
        //Call the upload() function


        /** @var Filelink $filelink */
        $filelink = $client->upload($logoFile->tempName, ['filename' => $logoFile->name]);

        $res = ['link' => $filelink->url()];

        //Logging File
        $dataLogging = [
            'type'     => 'filestack',
            'base_url' => '',
            'path'     => $filelink->handle,
            'metaData' => $filelink->getMetaData(),
        ];

        FileStorageItem::saveItem($dataLogging);

        // Response data
        Yii::$app->response->format = Yii::$app->response->format = Response::FORMAT_JSON;

        return $res;
    }

    /*
    * Action Upload File For Froala WYSIWYG HTML Editor
    *
    * @param file $file
    *
    * @return file infor
    * */
    public function actionUploadGoogle()
    {
        // Get file link
        $fileName = 'file';
        $logoFile = UploadedFile::getInstanceByName($fileName);
        $config = [
            'predefinedAcl' => 'publicRead'
        ];
        $filePath = Yii::$app->fileStorageGCloud->save($logoFile, false, false, $config);
        $baseUrl = Yii::$app->fileStorageGCloud->baseUrl;


        $imageUrl = $baseUrl . '/' . $filePath;
        $res = ['link' => $imageUrl];

        // Response data
        Yii::$app->response->format = Yii::$app->response->format = Response::FORMAT_JSON;

        return $res;
    }

    /*
     * Google CloudStorage Upload
     * */
    public function actionUploadGoogleCloud()
    {
        $keyFilePath = getStoragePath() . '\key\YiiGroup-797194353469.json';
        $storage = new StorageClient([
            'projectId' => 'valued-ceiling-167301',
            'keyFile'   => json_decode(file_get_contents($keyFilePath), true)

        ]);
        $bucket = $storage->bucket('yiibucket');

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

        $baseUrl = 'https://storage.googleapis.com/yiibucket/';
        $imageUrl = $baseUrl . $filePath;
        $res = ['link' => $imageUrl];

        // Response data
        Yii::$app->response->format = Yii::$app->response->format = Response::FORMAT_JSON;

        return $res;
    }

    /*
    * Action Upload File For Froala WYSIWYG HTML Editor
    *
    * @param file $file
    *
    * @return file infor
    * */
    public function actionUploadUppy()
    {
        // Get file link
        //$res = ['url' => $imageUrl];
        $res = [
            'url'      => 'http://dev.yiiframework.vn/classified/storage/web/source/2/012018/u4lCPhRRm08nvZDhHdOzDjD4Aww5QF29.png',
            'whatever' => 'beep boop'
        ];

        // Response data
        Yii::$app->response->format = Yii::$app->response->format = Response::FORMAT_JSON;

        return $res;
    }

    /*
   * User Chart
   * */
    public function actionChart()
    {
        $dateRange = getParam('date_range', date('Y-m-d', strtotime('-15 day')) . '-' . date('Y-m-d'));
        $fromDate = strtotime(substr($dateRange, 0, 10));
        $toDate = strtotime(substr($dateRange, 11));
        $arrLabel = [];
        $dataDate = [];
        $total = 0;

        $getObjectId = getParam('object_id', null);
        while ($fromDate <= $toDate) {
            $tsStartOfDay = strtotime("midnight", $fromDate);

            $totalInDay = FileStorageItem::find()
                ->andWhere(
                    ['between', 'created_at', $tsStartOfDay, $tsStartOfDay + 3600 * 24])
                ->count();
            $arrLabel[] = getFormat()->asDate($fromDate);
            $dataDate[] = $totalInDay;
            $total += $totalInDay;
            //Increment 1 day
            $fromDate = strtotime("+1 day", $fromDate);
        }
        $arrDataset[] = [
            'label'                => 'User Stat',
            'backgroundColor'      => "rgba(255,99,132,0.2)",
            'borderColor'          => "rgba(255,99,132,1)",
            'pointBackgroundColor' => "rgba(255,99,132,1)",
            'fill'                 => false,
            'data'                 => $dataDate,
        ];

        return $this->render('chart', [
            'dateRange'  => $dateRange,
            'arrLabel'   => $arrLabel,
            'arrDataset' => $arrDataset,
            'total'      => $total
        ]);
    }

    /**
     * Deletes an existing FileStorageItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionClean()
    {
        $query = FileStorageItem::find()->all();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FileStorageItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FileStorageItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FileStorageItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
