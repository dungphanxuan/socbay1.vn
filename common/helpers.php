<?php
/**
 * Yii2 Shortcuts
 * @author Eugene Terentev <eugene@terentev.net>
 * -----
 * This file is just an example and a place where you can add your own shortcuts,
 * it doesn't pretend to be a full list of available possibilities
 * -----
 */

/**
 * @return int|string
 */
function getMyId()
{
    return Yii::$app->user->getId();
}

/*Get Company Id from user*/
function getCompanyId($uid = null)
{
    $cModel = \common\models\job\Company::find()->where(['user_id' => $uid ? $uid : Yii::$app->user->getId()])->one();
    if ($cModel) {
        return $cModel->id;
    }

    return 0;
}

/**
 * @param string $view
 * @param array $params
 * @return string
 */
function render($view, $params = [])
{
    return Yii::$app->controller->render($view, $params);
}

/**
 * @param     $url
 * @param int $statusCode
 * @return \yii\web\Response
 */
function redirect($url, $statusCode = 302)
{
    return Yii::$app->controller->redirect($url, $statusCode);
}

/**
 * @param       $form \yii\widgets\ActiveForm
 * @param       $model
 * @param       $attribute
 * @param array $inputOptions
 * @param array $fieldOptions
 * @return string
 */
function activeTextinput($form, $model, $attribute, $inputOptions = [], $fieldOptions = [])
{
    return $form->field($model, $attribute, $fieldOptions)->textInput($inputOptions);
}

/**
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function env($key, $default = null)
{

    $value = getenv($key);

    if ($value === false) {
        return $default;
    }

    switch (strtolower($value)) {
        case 'true':
        case '(true)':
            return true;

        case 'false':
        case '(false)':
            return false;
    }

    return $value;
}

function getStoragePath()
{
    $storagePath = \Yii::getAlias('@storage');

    return $storagePath;
}

function detectMobile()
{
    $d = new \common\helpers\Mobile_Detect();
    return $d->isMobile();
}

function slack()
{
    return Yii::$app->slack;
}

function redis()
{
    return Yii::$app->redis;
}

function redisCloud()
{
    return Yii::$app->rediscloud;
}

function cache()
{
    return Yii::$app->cache;
}

function dataCache()
{
    return Yii::$app->dcache;
}

function systemCache()
{
    return Yii::$app->scache;
}

function baseUrl()
{
    return Yii::$app->request->baseUrl;
}

function apiUrl()
{
    return Yii::$app->urlManagerApi;
}

function frontendUrl()
{
    return Yii::$app->urlManagerFrontend;
}

function frontendNewUrl()
{
    return Yii::$app->urlManagerFrontendNew;
}

function storageUrl()
{
    return Yii::$app->urlManagerStorage;
}

function fileSystem()
{
    return Yii::$app->fileStorage->getFilesystem();
}

function fileStorage()
{
    return Yii::$app->fileStorage;
}

function fileStorage1()
{
    return Yii::$app->fileStorage1;
}

/**
 * Check whether a file exists on storage.
 *
 * @param string $path
 *
 * @return bool
 */

function pathExist($path)
{
    $exis = Yii::$app->fileStorage->getFilesystem()->has($path);

    return $exis;
}

function getParam($name, $defaultValue = null)
{
    return Yii::$app->request->get($name, $defaultValue);
}

function postParam($name, $defaultValue = null)
{
    return Yii::$app->request->post($name, $defaultValue);
}

function isAdministrator()
{
    return Yii::$app->user->can('administrator');
}

function isManager()
{
    return Yii::$app->user->can('manager');
}

/*Model is Creator*/
function isCreatorRole()
{
    $roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId());
    $c = '';
    if ($roles) {
        $c = reset($roles)->name;
    }

    return ($c == 'creator') ? true : false;
}

/*Model is User*/
function isUserRole()
{
    $roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId());
    $c = '';
    if ($roles) {
        $c = reset($roles)->name;
    }

    return ($c == 'user') ? true : false;
}


function isAjax()
{
    return Yii::$app->request->isAjax;
}

function isPost()
{
    return Yii::$app->request->isPost;
}


function isValidTimeStamp($timestamp)
{
    return ((string)(int)$timestamp === $timestamp)
        && ($timestamp <= PHP_INT_MAX)
        && ($timestamp >= ~PHP_INT_MAX);
}

/**
 * Returns the formatter component.
 * @return \yii\i18n\Formatter the formatter application component.
 */
function getFormat()
{
    return Yii::$app->getFormatter();
}

/**
 * Returns the formatter component.
 * @return \yii\i18n\Formatter the formatter application component.
 */
function getViFormat()
{
    $format = Yii::$app->getFormatter();
    $format->thousandSeparator = ' ';
    $format->numberFormatterOptions = [
        NumberFormatter::MAX_FRACTION_DIGITS => 0
    ];

    return $format;
}

/**
 * Returns the formatter component.
 * @return \yii\i18n\Formatter the formatter application component.
 */
function getCurrencyFormat()
{
    $format = Yii::$app->getFormatter();
    $format->thousandSeparator = '.';


    return $format;
}

/**
 * Returns the formatter component.
 * @return \yii\i18n\Formatter the formatter application component.
 */
function getShowFormat($s = ' ')
{
    $format = Yii::$app->getFormatter();
    $format->thousandSeparator = $s;
    $format->numberFormatterOptions = [
        NumberFormatter::MAX_FRACTION_DIGITS => 0
    ];

    return $format;
}

/**
 * Returns the formatter component.
 * @return \yii\i18n\Formatter the formatter application component.
 */
function getInputFormat()
{
    $format = Yii::$app->getFormatter();
    $format->thousandSeparator = ' ';
    $format->numberFormatterOptions = [
        NumberFormatter::MAX_FRACTION_DIGITS => 0
    ];

    return $format;
}

/*
 * Remove all files, folders and their subfolders
*/
function rrmdir($dir, $type = 1)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {

            if ($object != "." && $object != "..") {

                if (filetype($dir . "/" . $object) == "dir") {
                    rrmdir($dir . "/" . $object);
                } else {
                    if ($object != '.gitignore') {
                        unlink($dir . "/" . $object);
                    }

                }
            }
        }
        reset($objects);
        switch ($type) {
            case 1:
                //Check Dir not assets
                if (strpos($dir, 'assets/')) {
                    rmdir($dir);
                }
                break;
            case 2:
                //Check Dir not Cache
                if (strpos($dir, 'cache/')) {
                    rmdir($dir);
                }
                break;
        }


    }
    // return true;
}

/*
 * The dd function dumps the given variables and ends execution of the script:
 * */
function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die;
}