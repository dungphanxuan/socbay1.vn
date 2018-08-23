<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 10/4/2017
 * Time: 2:45 PM
 */

namespace common\jobs;

use yii\base\BaseObject;

class ImageDownloadJob extends BaseObject implements \yii\queue\JobInterface
{
    public $url;
    public $file;

    public function execute($queue)
    {
        file_put_contents($this->file, file_get_contents($this->url));
    }
}