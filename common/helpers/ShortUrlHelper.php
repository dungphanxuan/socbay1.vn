<?php

/**
 * Created by PhpStorm.
 * User: dungphanxuan
 * Date: 5/9/2017
 * Time: 8:17 AM
 */

namespace common\helpers;

use yii\helpers\Inflector;
use yii\helpers\Json;

/**
 * Collection of useful helper functions for Yii Applications
 *
 * @author Dung Phan Xuan <dungphanxuan999@gmail.com>
 *
 */
class ShortUrlHelper extends Inflector
{
    private static $apiUrl = 'https://www.googleapis.com/urlshortener/v1/url';
    public static $key = 'AIzaSyBwFEhASOoNaKbs5tDo3GYpvhlJ1Z6RpSE';

    /*Get short url
     * @param string $url Web url
     * @return string short url
     */
    public static function getShorten($url)
    {
        $curl = new CurlHelper();
        $data = [
            'longUrl' => $url
        ];
        $data_string = json_encode($data);
        $response = $curl->setOption(CURLOPT_POSTFIELDS, $data_string
        )->setOption(CURLOPT_HTTPHEADER,
            [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string)
            ]
        )->post(self::$apiUrl . '?key=' . self::$key);

        $data = Json::decode($response);

        return isset($data['id']) ? $data['id'] : false;
    }

    /*Get long url
     * @param string $shortUrl Web url
     * @return string long url
     */
    public static function getLongUrl($shortUrl)
    {
        $curl = new CurlHelper();
        $response = $curl->get(self::$apiUrl . '?key=' . self::$key . '&shortUrl=' . $shortUrl);
        $data = Json::decode($response);

        return isset($data['longUrl']) ? $data['longUrl'] : false;

    }
}