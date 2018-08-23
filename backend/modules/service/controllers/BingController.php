<?php

namespace backend\modules\service\controllers;

use backend\modules\service\helper\BingApi;
use yii\helpers\Inflector;
use yii\web\Controller;

/**
 * Default controller for the `service` module
 */
class BingController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

// NOTE: Be sure to uncomment the following line in your php.ini file.
// ;extension=php_openssl.dll

// **********************************************
// *** Update or verify the following values. ***
// **********************************************

// Replace the accessKey string value with your valid access key.
        $accessKey = '4c70589549fd4c3881c89abc2361a138';
        //$accessKey = 'bdca29ee43a14c46a6acecf316608aa0';

// Verify the endpoint URI.  At this writing, only one endpoint is used for Bing
// search APIs.  In the future, regional endpoints may be available.  If you
// encounter unexpected authorization errors, double-check this value against
// the endpoint for your Bing Web search instance in your Azure dashboard.
        $endpoint = 'https://api.cognitive.microsoft.com/bing/v7.0/search';

        $term = 'Microsoft Cognitive Services';

        echo "<pre>";

        if (strlen($accessKey) == 32) {

            print "Searching the Web for: " . $term . "\n";


            list($headers, $json) = BingApi::BingWebSearch($endpoint, $accessKey, $term);

            print "\nRelevant Headers:\n\n";
            foreach ($headers as $k => $v) {
                print $k . ": " . $v . "\n";
            }

            print "\nJSON Response:\n\n";
            echo json_encode(json_decode($json), JSON_PRETTY_PRINT);

        } else {

            print("Invalid Bing Search API subscription key!\n");
            print("Please paste yours into the source code.\n");

        }
        dd('done');
        //return $this->render('index');
    }

    public function actionImage()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $accessKey = '4c70589549fd4c3881c89abc2361a138';
        //$accessKey = 'bdca29ee43a14c46a6acecf316608aa0';
        $endpoint = 'https://api.cognitive.microsoft.com/bing/v7.0/images/search';

        //$term = 'HÀ NỘI HOMELAND';
        //$term = 'the k park ha dong';
        $term = 'NHÀ Ở LIỀN KẾ LỘC NINH';
        //$term = Inflector::slug($term);
        echo "<pre>";

        if (strlen($accessKey) == 32) {

            print "Searching images for: " . $term . "\n";

            list($headers, $json) = BingApi::BingImageSearch($endpoint, $accessKey, $term);

            print "\nRelevant Headers:\n\n";
            foreach ($headers as $k => $v) {
                print $k . ": " . $v . "\n";
            }

            print "\nJSON Response:\n\n";
            //return $json
            $data = json_decode($json);
            //dd($data->value[0]->contentUrl);
            echo json_encode(json_decode($json), JSON_PRETTY_PRINT);

        } else {

            print("Invalid Bing Search API subscription key!\n");
            print("Please paste yours into the source code.\n");

        }

    }
}
