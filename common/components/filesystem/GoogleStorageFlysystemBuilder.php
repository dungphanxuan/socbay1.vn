<?php

namespace common\components\filesystem;

use common\components\filesystem\adapter\GoogleStorageAdapter;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use trntv\filekit\filesystem\FilesystemBuilderInterface;
use Google\Cloud\Storage\StorageClient;
use yii\base\InvalidConfigException;

/**
 * Class LocalFlysystemProvider
 * @author Eugene Terentev <eugene@terentev.net>
 */
class GoogleStorageFlysystemBuilder implements FilesystemBuilderInterface
{
    public $path;

    public $project_id;

    public $bucket_name;

    public $prefix = '1';

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->project_id === null) {
            throw new InvalidConfigException('The "projectId" property must be set.');
        }
        if ($this->bucket_name === null) {
            throw new InvalidConfigException('The "bucket" property must be set.');
        }
    }

    public function build()
    {
        //$jsonKeyFile = 'YiiGroup-797194353469.json';
        $jsonKeyFile = 'YiiGroup-8b1e60ec0ef9.json';
        $keyFilePath = getStoragePath() . '\key\\' . $jsonKeyFile;

        $storageClient = new StorageClient([
            'projectId' => $this->project_id,
            'keyFile'   => json_decode(file_get_contents($keyFilePath), true)
        ]);
        $bucket = $storageClient->bucket($this->bucket_name);

        $adapter = new GoogleStorageAdapter($storageClient, $bucket);

        return new Filesystem($adapter);
    }
}
