<?php
/**
 * Require core files
 */
require_once(__DIR__ . '/../helpers.php');

/**
 * Setting path aliases
 */
Yii::setAlias('@base', realpath(__DIR__ . '/../../'));
Yii::setAlias('@common', realpath(__DIR__ . '/../../common'));
Yii::setAlias('@frontend', realpath(__DIR__ . '/../../frontend'));
Yii::setAlias('@backend', realpath(__DIR__ . '/../../backend'));
Yii::setAlias('@console', realpath(__DIR__ . '/../../console'));
Yii::setAlias('@storage', realpath(__DIR__ . '/../../storage'));
Yii::setAlias('@api', realpath(__DIR__ . '/../../api'));

/**
 * Setting url aliases
 */
Yii::setAlias('@frontendUrl', env('FRONTEND_HOST_INFO') . env('FRONTEND_BASE_URL'));
Yii::setAlias('@backendUrl', env('BACKEND_HOST_INFO') . env('BACKEND_BASE_URL'));
Yii::setAlias('@apiUrl', env('API_HOST_INFO') . env('API_BASE_URL'));
Yii::setAlias('@storageUrl', env('STORAGE_HOST_INFO') . env('STORAGE_BASE_URL'));

/*
 * Define Cache Constrant
 * */
define('CACHE_SYSTEM_COMMON', 'aa');
define('CACHE_ARTICLE_DETAIL', 'ad');
define('CACHE_PROJECT_DETAIL', 'pd');
define('CACHE_ARTICLE_CATEGORY', 'ci');
define('CACHE_ARTICLE_REPORT', 'ra');
define('CACHE_ARTICLE_CATEGORY_DETAIL', 'tc');

/*
 * HTTP Cache KEY
*/
define('CACHE_ARTICLE_INDEX', 'mi');
define('CACHE_ARTICLE_VIEW', 'mv');

/*
 * Image Source Constrant
 * */

define('IMAGE_SOURCE_LOCAL', 'image_local');
define('IMAGE_SOURCE_FILESTACK', 'image_filestack');
define('IMAGE_SOURCE_CLOUDINARY', 'image_cloudinary');