<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\helpers\Console;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class AppController extends Controller
{
    public $interactive = false;

    public $writablePaths = [
        '@common/runtime',
        '@frontend/runtime',
        '@frontend/web/assets',
        '@api/runtime',
        '@api/web/assets',
        '@backend/runtime',
        '@backend/web/assets',
        '@storage/cache',
        '@storage/web/source'
    ];

    public $executablePaths = [
        '@api/yii',
        '@backend/yii',
        '@frontend/yii',
        '@console/yii',
    ];

    public $generateKeysPaths = [
        '@base/.env'
    ];

    public function actionSetup()
    {
        $this->runAction('set-writable', ['interactive' => $this->interactive]);
        $this->runAction('set-executable', ['interactive' => $this->interactive]);
        $this->runAction('set-keys', ['interactive' => $this->interactive]);
        \Yii::$app->runAction('migrate/up', ['interactive' => $this->interactive]);
        \Yii::$app->runAction('rbac-migrate/up', ['interactive' => $this->interactive]);
        \Yii::$app->runAction('business-migrate/up', ['interactive' => $this->interactive]);
        \Yii::$app->runAction('property-migrate/up', ['interactive' => $this->interactive]);
        \Yii::$app->runAction('job-migrate/up', ['interactive' => $this->interactive]);
        \Yii::$app->runAction('media-migrate/up', ['interactive' => $this->interactive]);
        \Yii::$app->runAction('classified-migrate/up', ['interactive' => $this->interactive]);

        //\Yii::$app->runAction('catalog-migrate/up', ['interactive' => $this->interactive]);
        //\Yii::$app->runAction('sale-migrate/up', ['interactive' => $this->interactive]);
        //\Yii::$app->runAction('marketing-migrate/up', ['interactive' => $this->interactive]);
        //\Yii::$app->runAction('report-migrate/up', ['interactive' => $this->interactive]);


        \Yii::$app->runAction('migrate/up', [
            'migrationPath' => '@vendor/dungphanxuan/yii2-vnlocation/migrations',
            'interactive'   => $this->interactive
        ]);

        //$this->runAction('cache-cache', ['interactive' => $this->interactive]);

    }

    /*
     * Run Console
     * */
    public function actionRun()
    {
        Console::output("Starting run console!");
    }

    /*
     * Run Console
     * */
    public function actionClearCache()
    {
        Console::output("Starting Clear Cache!");
        \Yii::$app->cache->flush();
        \Yii::$app->dcache->flush();
        \Yii::$app->scache->flush();

        //Clear Assets Folder
        $dir = Yii::getAlias('@base') . '/assets';
        rrmdir($dir);
    }

    /*
     * Run Queue
     * */
    public function actionJob()
    {
        Console::output("Start Run Job!");
        Yii::warning('Start Run Job', 'console');
        \Yii::$app->runAction('queue/run', ['interactive' => $this->interactive]);
    }

    public function actionSetWritable()
    {
        $this->setWritable($this->writablePaths);
    }

    public function actionSetExecutable()
    {
        $this->setExecutable($this->executablePaths);
    }

    public function actionSetKeys()
    {
        $this->setKeys($this->generateKeysPaths);
    }

    public function setWritable($paths)
    {
        foreach ($paths as $writable) {
            $writable = Yii::getAlias($writable);
            Console::output("Setting writable: {$writable}");
            @chmod($writable, 0777);
        }
    }

    public function setExecutable($paths)
    {
        foreach ($paths as $executable) {
            $executable = Yii::getAlias($executable);
            Console::output("Setting executable: {$executable}");
            @chmod($executable, 0755);
        }
    }

    public function setKeys($paths)
    {
        foreach ($paths as $file) {
            $file = Yii::getAlias($file);
            Console::output("Generating keys in {$file}");
            $content = file_get_contents($file);
            $content = preg_replace_callback('/<generated_key>/', function () {
                $length = 32;
                $bytes = openssl_random_pseudo_bytes(32, $cryptoStrong);

                return strtr(substr(base64_encode($bytes), 0, $length), '+/', '_-');
            }, $content);
            file_put_contents($file, $content);
        }
    }

    public function actionFakeData($limit = 100)
    {

    }
}
