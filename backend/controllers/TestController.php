<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 9/9/2017
 * Time: 11:08 AM
 */

namespace backend\controllers;

use backend\models\UploadForm;
use common\helpers\FacebookHelper;
use Da\TwoFA\Manager;
use Google\Cloud\Storage\Bucket;
use Yii;
use yii\data\ArrayDataProvider;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\web\Response;
use yii\web\UploadedFile;

class TestController extends BackendController
{
    public function actionId()
    {
        $str = 'v1522912471/image/042018/05-s4qUWoxMwkPMcKNNAGNEwlgA_5aWdMr.jpg';

        $a = strpos($str, '/');
        $str = substr($str, $a + 1);
        $b = strrpos($str, '.');
        var_dump($b);
        $str = substr($str, 0, $b);
        dd($str);

    }

    public function actionIndex()
    {
        dd(Url::to('http://cloud-upload', true));

        $a = Yii::$app->keyStorage->get('backend.theme-skin', 'skin-blue');
        dd($a);
        dd(Yii::$app->db->tablePrefix);
        dd('Test');
    }

    public function actionTime()
    {
        $appFormat = \Yii::$app->formatter;

        $a = $appFormat->asDatetime(time());

        dd($appFormat);

        dd($a);
    }

    public function actionFb()
    {
        $token = 'EAAbdm4ocv1MBACgypsx28G4kYNitSymqKSwd6nw8n4jkb3TzaPTdhVjnZAfv3uFgPD0l0K8wqZCh9TnqMOLpZAnV0icZALZAgJmK1NI9HIu8zM5oBu7KzEZBSCDbZCsWliQaQKcBln96ZBOjZC1oyxJ6GkJy6rm9vG3bOx6MtToPVA9amFdA5YGYo2JV6wX6JbiCkY9WKAKy0gwZDZD';
        $fb = new \Facebook\Facebook([
            'app_id' => env('FACEBOOK_CLIENT_ID'),
            'app_secret' => env('FACEBOOK_CLIENT_SECRET'),
            'default_graph_version' => 'v2.10',
            'default_access_token' => $token
        ]);

        try {
            $response = $fb->get('/me', $token);
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $me = $response->getGraphUser();
        echo 'Logged in as ' . $me->getName();
        dd('Facebook');
    }


    public function actionFb1()
    {
        //$pageID = 'svmteam';
        $pageID = 'nghemoigioibds';
        $cacheKey = [
            'data',
            'facebook'
        ];
        $items = FacebookHelper::feedPage($pageID);

        dd($items);
        $dataProvider = new ArrayDataProvider([
            'allModels' => $items,
            'sort' => [
                //'attributes' => ['id', 'username', 'email'],
            ],
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);
    }

    public function actionFb2()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $idAlbum = '855860281133912';
        $data = FacebookHelper::feedAlbumPhoto($idAlbum);

        //dd($data);

        return $data;
    }

    /*
     * Download image from url
     * */
    public function actionDownload1()
    {
        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        //$imageUrl = 'https://scontent.xx.fbcdn.net/v/t31.0-8/12239145_925382704181669_5850105953755069509_o.jpg.webp?oh=61f528d11e5a011e0085cc84f349675b&oe=5A87D5F5';
        //$imageUrl = 'https://scontent.xx.fbcdn.net/v/t1.0-0/p75x225/11221949_925382704181669_5850105953755069509_n.jpg.webp?oh=083f4066e41eac2917e57d21afcb46a1&oe=5A3F751E';
        //$imageUrl = 'http://www.google.co.in/intl/en_com/images/srpr/logo1w.png';
        $imageUrl = 'https://scontent.xx.fbcdn.net/v/t31.0-8/22426378_1486446824741918_8052071714442619533_o.jpg?oh=9d785afba2aaf51114fd182edc349715&oe=5A6FFA3D';
        $image_Data = file_get_contents($imageUrl, false, stream_context_create($arrContextOptions));
        //file_put_contents(Yii::getAlias('storage'). '/web/source/' . 1 . '.png', $image_Data);
        file_put_contents(Yii::getAlias('@storage') . '/web/source/' . 3 . '.jpg', $image_Data);

        dd('done');

    }

    public function actionRedis()
    {

        //redis()->set('a', 1000);
        $a = redis()->get('a');
        $a = redis()->get('a');
        dd($a);

        return $this->render('redis');
    }

    public function actionFolder()
    {
        dd(Yii::getAlias('@base'));
        dd(Yii::getAlias('@backend'));
        //dd(strpos('how are', 'a7e'));
        $path = Yii::getAlias('@app');
        $dir = $path . '/assets';
        $a = rrmdir($dir);
        dd('done');
    }


    public function actionOtp()
    {

        $manager = new Manager();

        $key = '228528';
        $valid = $manager->verify($key, '6MOMY3OYROGIW3OL');
        dd($valid);
        dd('Test');
    }


    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $config = [
                'predefinedAcl' => 'publicRead'
            ];
            $fileName = 'UploadForm[imageFile]';
            $logoFile = UploadedFile::getInstanceByName($fileName, false, false, $config);

            $filePath = Yii::$app->fileStorageGCloud->save($logoFile);

            // file is uploaded successfully
            return $this->goHome();
        }

        return $this->render('upload', ['model' => $model]);
    }

    public function actionQueue()
    {
        $str = 'text';
        StringHelper::truncate($str, 50);
        Yii::$app->queue->run();
    }


}