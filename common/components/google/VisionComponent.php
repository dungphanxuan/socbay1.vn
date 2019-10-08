<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 10/5/2017
 * Time: 9:41 AM
 */

namespace common\components\google;

use Google\Cloud\Vision\VisionClient;
use yii\base\Component;

class VisionComponent extends Component
{
    /**
     * @var string
     */
    public $appId;

    /**
     * @var string
     */
    public $project_id;

    /*
     * @var VisionClient
     * */
    private $client;

    public function init()
    {
        parent::init();
        $keyFilePath = getStoragePath() . '\key\YiiGroup-797194353469.json';

        $this->client = new VisionClient([
            'projectId' => $this->project_id,
            'keyFile' => json_decode(file_get_contents($keyFilePath), true)
        ]);
    }

    public function detect_safe_search($path)
    {
        /** @var VisionClient $vision */
        $vision = $this->client;

        $image = $vision->image(file_get_contents($path), [
            'SAFE_SEARCH_DETECTION'
        ]);
        $result = $vision->annotate($image);
        $safe = $result->safeSearch();
        printf("Adult: %s\n", $safe->isAdult() ? 'yes' : 'no');
        printf("Spoof: %s\n", $safe->isSpoof() ? 'yes' : 'no');
        printf("Medical: %s\n", $safe->isMedical() ? 'yes' : 'no');
        printf("Violence: %s\n\n", $safe->isViolent() ? 'yes' : 'no');
    }


    function detect_face($path)
    {
        /** @var VisionClient $vision */
        $vision = $this->client;

        $image = $vision->image(file_get_contents($path), ['FACE_DETECTION']);
        $result = $vision->annotate($image);
        print("Faces:\n");
        foreach ((array)$result->faces() as $face) {
            printf("Anger: %s\n", $face->isAngry() ? 'yes' : 'no');
            printf("Joy: %s\n", $face->isJoyful() ? 'yes' : 'no');
            printf("Surprise: %s\n\n", $face->isSurprised() ? 'yes' : 'no');
        }
        return $result;
    }

    /*
     * @param $filePath
     *
     * @return bool
     * */
    public function actionVisionSafe($filePath)
    {
        $isSafe = true;
        if (fileSystem()->has($filePath)) {
            /** @var VisionClient $vision */
            $vision = $this->client;

            // Annotate an image, detecting faces.
            $image = $vision->image(
                fopen(getStoragePath() . '\web\source\\' . $filePath, 'r'),
                ['SAFE_SEARCH_DETECTION']
            );

            $result = $vision->annotate($image);

            $safe = $result->safeSearch();

            if ($safe->isAdult()) {
                $isSafe = false;
            };
            if ($safe->isSpoof()) {
                $isSafe = false;
            };
            if ($safe->isMedical()) {
                $isSafe = false;
            };
            if ($safe->isViolent()) {
                $isSafe = false;
            };
        }

        return $isSafe;
    }
}