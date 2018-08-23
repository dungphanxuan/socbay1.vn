<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 3/6/2018
 * Time: 9:42 AM
 */

namespace common\helpers;

/*
 * Class FilestackHelper
 * */

class GoogleDriverHelper
{
    /*
     * Download
     * */
    public static function download($id)
    {
        $url = 'https://drive.google.com/uc?export=download&id=' . $id;

        return $url;
    }

    public static function getDownloadUrl($id)
    {
        $url = 'https://drive.google.com/uc?export=download&id=' . $id;

        return $url;
    }

    public static function getViewUrl($id)
    {
        $url = 'https://drive.google.com/uc?export=view&id=' . $id;

        return $url;
    }

    public static function getId($url)
    {
        $dbken = '';
        if (strpos($url, 'drive.google.com/file/d/') !== false) {
            $pattern = '/(?<=file\/d\/)(.*)(?=\/)/';
            $succefss = preg_match($pattern, $url, $maftch);
            $dbken = $maftch[0];
        }

        return $dbken;
    }

}