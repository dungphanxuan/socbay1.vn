<?php

namespace common\helpers;


use yii\helpers\Inflector;

/**
 * Collection of useful helper functions for Yii Applications
 *
 * @author dungphanxuan <dungphanxuan999@gmail.com>
 * @since  1.0
 *
 */
class FileHelper
{

    /*Get File name without extendsion*/
    public static function getFileInfo($fileName)
    {
        $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileName);
        $a = Inflector::slug($withoutExt);

        return substr($a, 0, 40);
    }

    /*
     * Check Url is exits
     * */
    public static function is_url_exist($url)
    {

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        dd($code);
        if ($code == 200) {
            $status = true;
        } else {
            $status = false;
        }
        curl_close($ch);

        return $status;
    }


    public static function url_exists($file)
    {
        $file_headers = @get_headers($file);

        //dd( $file_headers );

        if (!$file_headers || $file_headers[0] == 'HTTP/1.0 404 Not Found') {
            $exists = false;
        } else {
            $exists = true;
        }

        return $exists;
    }

    public static function url_exists1($file)
    {
        $file_headers = @get_headers($file);


        if (!$file_headers || $file_headers[0] == 'HTTP/1.0 404 Not Found' || strpos($file_headers[0], '404') !== false) {
            $exists = false;
        } else {
            $exists = true;
        }

        return $exists;
    }


}