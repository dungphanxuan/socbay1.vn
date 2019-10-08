<?php

namespace common\components\cloud;

use Yii;
use Cloudinary;
use Cloudinary\Uploader;
use trntv\filekit\File;
use yii\base\Component;
use yii\helpers\Url;

class CloudinaryComponent extends Component
{
    public $cloud_name;
    public $api_key;
    public $api_secret;
    public $cdn_subdomain;
    public $useSiteDomain = false;

    /** @var string */
    public $prefix = '';

    public function init()
    {
        parent::init();
        Cloudinary::config([
            'cloud_name' => $this->cloud_name,
            'api_key' => $this->api_key,
            'api_secret' => $this->api_secret,
            'cdn_subdomain' => $this->cdn_subdomain,
        ]);
    }

    /**
     * @param       $publicId
     * @param array $options
     * @return string
     */
    public function getUrl($publicId, array $options = [])
    {
        $baseUrl = cloudinary_url($publicId, $options);
        if (true === $this->useSiteDomain) {
            $homeUrl = Url::home(true);
            $baseUrl = preg_replace('/^https?:\/\/\w+.cloudinary.com\//i', $homeUrl, $baseUrl);
        }
        return $baseUrl;
    }

    /**
     * @param       $file
     * @param array $options
     * @return mixed
     */
    public function uploadFile($file, array $options = [])
    {
        return Uploader::upload($file, $options);
    }

    /**
     * @param       $file string|\yii\web\UploadedFile
     * @param array $options
     * @return mixed
     */
    public function upload($file, array $options = [], $baseUrl = null, $pathFile = null, $allData = false)
    {
        $pathName = implode('.', [
            date('d') . \Yii::$app->security->generateRandomString(),
        ]);
        if ($pathFile) {
            $pathName = $pathFile;
        }
        $options = [
            'public_id' => $pathName,
            //'folder'    => 'image/' . date('mY')
            'folder' => 'image/' . date('Y') . '/' . date('m') . '/'
        ];

        $data = Uploader::upload($file->tempName, $options);

        $url = $data['secure_url'];
        $filePath = str_replace($baseUrl . '/', '', $url);

        //dd($data);
        //$publicId = $data['publish_id'];

        return $filePath;
    }

    /**
     * @param       $publicId
     * @param array $options
     * @return string
     */
    public function destroy($publicId, array $options = [])
    {
        // v1522912471/image/042018/05-s4qUWoxMwkPMcKNNAGNEwlgA_5aWdMr.jpg
        //Remover version, file extension
        $indexVersion = strpos($publicId, '/');
        $publicId = substr($publicId, $indexVersion + 1);
        $indexExt = strrpos($publicId, '.');
        $publicId = substr($publicId, 0, $indexExt);

        $nOption = [
            'invalidate' => true
        ];

        $status = Uploader::destroy($publicId, $options);
        return true;
    }

    public function exits($publicId, array $options = [])
    {

    }


}
