<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/15/2017
 * Time: 10:50 AM
 */

namespace common\components\filekit;

use trntv\filekit\File;
use trntv\filekit\Storage;
use Yii;

class FileStorage extends Storage
{

    /*
     * Override  Method
     * */
    public function save($file, $preserveFileName = false, $overwrite = false, $config = [], $file_path = false)
    {
        $fileObj = File::create($file);
        //$dirIndex = $this->getDirIndex();
        $baseDir = implode('/', [date('Y'), date('m')]);
        $dirIndex = $baseDir;
        if ($preserveFileName === false) {
            do {
                $filename = implode('.', [
                    time() . Yii::$app->security->generateRandomString(),
                    $fileObj->getExtension()
                ]);
                $path = implode('/', [$dirIndex, $filename]);
            } while ($this->getFilesystem()->has($path));
        } else {
            $filename = $fileObj->getPathInfo('filename');
            $path = implode('/', [$dirIndex, $filename]);
        }
        //File Path
        if ($file_path) {
            $path = $file_path;
        }

        $this->beforeSave($fileObj->getPath(), $this->getFilesystem());

        $stream = fopen($fileObj->getPath(), 'rb+');

        $config = array_merge(['ContentType' => $fileObj->getMimeType()], $config);
        if ($overwrite) {
            $success = $this->getFilesystem()->putStream($path, $stream, $config);
        } else {
            $success = $this->getFilesystem()->writeStream($path, $stream, $config);
        }

        if (is_resource($stream)) {
            fclose($stream);
        }

        if ($success) {
            $this->afterSave($path, $this->getFilesystem());

            return $path;
        }

        return false;
    }

    /*
     * Backup File
     * */
    public function backup($file, $fileName)
    {

    }

}