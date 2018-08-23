<?php

namespace backend\modules\testing\controllers;

use Filestack\FilestackClient;
use yii\web\Controller;

/**
 * Default controller for the `testing` module
 */
class UploadController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionFileStack()
    {
        $client = new FilestackClient(env('FILESTACK_API_KEY'));
        //Call the upload() function


        $filePath = '';
        $filelink = $client->upload($filePath, ['filename' => 'File Name']);

        dd($filelink);

        return $this->render('index');
    }
}
