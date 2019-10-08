<?php

namespace frontend\modules\testing\controllers;

use common\helpers\FilestackHelper;
use Filestack\FilestackClient;
use Filestack\Filelink;
use Filestack\FilestackException;
use Filestack\FilestackSecurity;
use yii\httpclient\Client;

/*
 * Class FilestackController
 * */

class FilestackController extends \yii\web\Controller
{
    public function actionCrop()
    {
        return $this->render('crop');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView()
    {
        /** @var Filelink $filelink */
        $filelink = new Filelink('Zmi2DCXMSXmwSeWvF06Q');

        dd($filelink->getMetaData());
        return $this->render('index');
    }

    public function actionUpload()
    {
        $client = new FilestackClient("API_KEY");

        $filelink = $client->upload('/path/to/file/foo.jpg');

        # OR

        $filelink = $client->uploadUrl('https://some-domain.com/some-image.jpg');

        # use Intelligent Ingestion

        $test_filepath = '';
        $filelink = $client->upload($test_filepath, ['intelligent' => true]);
        return $this->render('index');
    }

    public function actionResize()
    {
        return $this->render('resize');
    }

    public function actionDelete()
    {
        $fileHander = 'PFXVMPlbQzKLPkIktXGa';

        $filelink = new Filelink($fileHander);

        $security = new FilestackSecurity(env('FILESTACK_API_SECRET'));
        //$filelink = new Filelink($fileHander, $security);

        //$result = $filelink->delete();

        # OR

        //dd($result);
        $client = new FilestackClient(env('FILESTACK_API_KEY'), $security);

        $httpClient = new Client();
        $response = $httpClient->createRequest()
            ->setMethod('GET')
            ->setUrl($filelink->url())
            ->send();
        if ($response->isOk) {
            $client->delete($fileHander);
        }

        //return $this->render('resize');
    }

    public function actionDownload()
    {
        $filelink = new Filelink('FILE_HANDLE');

        $result = $filelink->download('/path/to/destination');

        # OR

        $client = new FilestackClient('API_KEY');
        $result = $client->download('FILE_HANDLE', '/path/to/destination');

        # OR

        $result = $client->download('https://somedomain.com/somefile', '/path/to/destination');
        return $this->render('resize');
    }

    public function actionZip()
    {
        $client = new FilestackClient(env('FILESTACK_API_KEY'));

        $sources = [
            'ZoVdwbe6Qcu9uIxIZSuU',
            'ohlr0aJ6RDushqwjTulg',

        ];

        $store_options = ['filename' => 'foo.zip'];

        /** @var Filelink $filelink */
        $filelink = $client->zip($sources, $store_options);

        dd($filelink->url());
        return $this->render('view');
    }


    public function actionWatermark()
    {
        return $this->render('watermark');
    }

    public function actionURLScreenshot()
    {
        $url = 'https://en.wikipedia.org/wiki/Main_Page';

        $client = new FilestackClient('API_KEY');
        $filelink = $client->screenshot($url);

        # With Options
        $store_options = ['filename' => 'myscreenshot_file.png'];
        $agent = 'mobile';
        $mode = 'window';
        $width = 102400;
        $height = 768;
        $delay = 2000;  // 2 seconds

        $filelink = $client->screenshot($url, $store_options, $agent,
            $mode, $width, $height, $delay);
        return $this->render('watermark');
    }


    public function actionResize1()
    {
        /** @var Filelink $filelink */
        $filelink = new Filelink('Zmi2DCXMSXmwSeWvF06Q');

        $width = 100;
        $height = 100;
        $fit = 'scale';
        $align = 'left';

        $filelink1 = $filelink->resize($width, $height, $fit, $align);

        dd($filelink1->url());
        # OR
    }

    public function actionTransformation1()
    {
        $hander = 'Zmi2DCXMSXmwSeWvF06Q';
        $url = FilestackHelper::watermark($hander);
        //dd($url);

        return $this->render('watermark', ['url' => $url]);
    }

    public function actionTransformation()
    {
        /** @var FilestackClient $client */
        $client = new FilestackClient(env('FILESTACK_API_KEY'));

        $hander = 'Zmi2DCXMSXmwSeWvF06Q';
        $url = "https://cdn.filestackcontent.com/" . $hander;
        $transform_tasks = [
            'resize' => ['w' => '300', 'h' => '200', 'fit' => 'crop'],
            'watermark' => ['file' => 'bikKdunjQ9ubyLitiW80', 'size' => '50', 'position' => '[bottom,right]']
        ];

        /** @var Filelink $filelink */
        $filelink = $client->transform($url, $transform_tasks);

        //https://cdn.filestackcontent.com/YkvLsiqRSXGDyrsdhc0P
        dd($filelink->url());

        return $this->render('watermark');
    }

}
