<?php

namespace backend\modules\cloud\controllers;

use Google\Cloud\Core\ServiceBuilder;
use Google\Cloud\Storage\StorageClient;
use Google\Cloud\Vision\VisionClient;
use yii\web\Controller;

/**
 * Default controller for the `cloud` module
 */
class TestController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionAuth1()
    {
        $storagePath = \Yii::getAlias('@storage');
        dd($storagePath);
        $keyFilePath = $storagePath . '\key\YiiGroup-797194353469.json';
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $keyFilePath);

        $cloud = new ServiceBuilder();

        dd('done');
    }

    public function actionAuth()
    {
// Authenticate using a keyfile path
        $cloud = new ServiceBuilder([
            'keyFilePath' => 'path/to/keyfile.json'
        ]);

// Authenticate using keyfile data
        $cloud = new ServiceBuilder([
            'keyFile' => json_decode(file_get_contents('/path/to/keyfile.json'), true)
        ]);

        return $this->render('index');
    }

    public function actionVision()
    {
        $keyFilePath = getStoragePath() . '\key\YiiGroup-797194353469.json';

        $vision = new VisionClient([
            'projectId' => 'valued-ceiling-167301',
            'keyFile' => json_decode(file_get_contents($keyFilePath), true)
        ]);

        $type = 'faces';
        /*$image = new Imag`\
        e($imageResource, [
 *     'faces',          // Corresponds to `FACE_DETECTION`
 *     'landmarks',      // Corresponds to `LANDMARK_DETECTION`
 *     'logos',          // Corresponds to `LOGO_DETECTION`
 *     'labels',         // Corresponds to `LABEL_DETECTION`
 *     'text',           // Corresponds to `TEXT_DETECTION`,
 *     'document',       // Corresponds to `DOCUMENT_TEXT_DETECTION`
 *     'safeSearch',     // Corresponds to `SAFE_SEARCH_DETECTION`
 *     'imageProperties',// Corresponds to `IMAGE_PROPERTIES`
 *     'crop',           // Corresponds to `CROP_HINTS`
 *     'web'             // Corresponds to `WEB_DETECTION`
        */
        // Annotate an image, detecting faces.
        $image = $vision->image(
            fopen(getStoragePath() . '\web\source\1.jpg', 'r'),
            ['faces']
        );

        $annotation = $vision->annotate($image);

        dd($annotation->faces());
        print("LABELS:\n");

        // Determine if the detected faces have headwear.
        foreach ($annotation->faces() as $key => $face) {
            dd($face);
            if ($face->hasHeadwear()) {
                echo "Face $key has headwear.\n";
            }
        }
        dd('done');

        return $this->render('index');
    }

    public function actionVisionSafe()
    {
        $keyFilePath = getStoragePath() . '\key\YiiGroup-797194353469.json';

        $vision = new VisionClient([
            'projectId' => 'valued-ceiling-167301',
            'keyFile' => json_decode(file_get_contents($keyFilePath), true)
        ]);

        $type = 'safeSearch';

        // Annotate an image, detecting faces.
        $image = $vision->image(
            fopen(getStoragePath() . '\web\source\nude.jpg', 'r'),
            ['SAFE_SEARCH_DETECTION']
        );

        $result = $vision->annotate($image);

        $safe = $result->safeSearch();

        var_dump('aa' . $safe->isAdult());

        printf("Adult: %s\n", $safe->isAdult() ? 'yes' : 'no');
        printf("Spoof: %s\n", $safe->isSpoof() ? 'yes' : 'no');
        printf("Medical: %s\n", $safe->isMedical() ? 'yes' : 'no');
        printf("Violence: %s\n\n", $safe->isViolent() ? 'yes' : 'no');

        dd('done');

        return $this->render('index');
    }

    public function actionStorage()
    {
        //$filePath = \Yii::$app->fileStorageGCloud->getFilesystem()->createDir('d');
        //dd('ok');
        $keyFilePath = getStoragePath() . '\key\YiiGroup-797194353469.json';


        $storage = new StorageClient([
            'projectId' => 'valued-ceiling-167301',
            'keyFile' => json_decode(file_get_contents($keyFilePath), true)

        ]);

        $bucket = $storage->bucket('yiibucket');

// Upload a file to the bucket.
        /*$bucket->upload(
            fopen(getStoragePath() . '\web\source\1.jpg', 'r')
        );*/

// Using Predefined ACLs to manage object permissions, you may
// upload a file and give read access to anyone with the URL.
        $bucket->upload(
            fopen(getStoragePath() . '\web\source\1.jpg', 'r'),
            [
                //'name' => '123.jpg',
                'predefinedAcl' => 'publicRead'
            ]
        );

        dd('Upload Done');

    }
}
