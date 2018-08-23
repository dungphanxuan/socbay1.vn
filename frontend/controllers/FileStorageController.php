<?php

namespace frontend\controllers;

use backend\models\search\FileStorageItemSearch;
use common\components\filesystem\actions\LocalUploadAction;
use common\models\FileStorageItem;
use Filestack\Filelink;
use Filestack\FilestackClient;
use Google\Cloud\Storage\StorageClient;
use trntv\filekit\File;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * FileStorageController implements the CRUD actions for FileStorageItem model.
 */
class FileStorageController extends Controller
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return \yii\helpers\ArrayHelper::merge(parent::behaviors(), [
            'verbs'  => [
                'class'   => VerbFilter::class,
                'actions' => [
                    'delete'        => ['post'],
                    'upload-delete' => ['delete'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ]);
    }


    public function actions()
    {
        return [
            'upload'          => [
                'class'       => LocalUploadAction::class,
                'deleteRoute' => 'upload-delete'
            ],
            'upload-delete'   => [
                'class' => 'trntv\filekit\actions\DeleteAction'
            ],
            'upload-imperavi' => [
                'class'            => 'trntv\filekit\actions\UploadAction',
                'fileparam'        => 'file',
                'responseUrlParam' => 'filelink',
                'multiple'         => false,
                'disableCsrf'      => true
            ]
        ];
    }

    /**
     * Lists all FileStorageItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FileStorageItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder' => ['created_at' => SORT_DESC]
        ];
        $components = \yii\helpers\ArrayHelper::map(
            FileStorageItem::find()->select('component')->distinct()->all(),
            'component',
            'component'
        );
        $totalSize = FileStorageItem::find()->sum('size') ?: 0;

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

    /*
   * Action Image Upload File For Froala WYSIWYG HTML Editor
   *
   * @param file $file
   *
   * @return file infor
   * */
    public function actionUploadInput()
    {
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

    /*
    * Action Image Upload File For Froala WYSIWYG HTML Editor
    *
    * @param file $file
    *
    * @return file infor
    * */
    public function actionUploadFroala()
    {
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
        $fileParam = 'file';
        $fileInstance = UploadedFile::getInstanceByName($fileParam);

        $client = new FilestackClient(env('FILESTACK_API_KEY'));
        //Call the upload() function

        /** @var Filelink $filelink */
        $filelink = $client->upload($fileInstance->tempName, ['filename' => $fileInstance->name]);

        $res = ['link' => $filelink->url()];

        // Response data
        Yii::$app->response->format = Yii::$app->response->format = Response::FORMAT_JSON;

        return $res;
    }

    /*
     * Google Cloud Storage Upload
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
            $arrLabel[] = date('Y-m-d', $fromDate);
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
