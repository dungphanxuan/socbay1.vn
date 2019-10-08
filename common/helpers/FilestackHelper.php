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

class CloudinaryHelper
{
    public static function transformation()
    {

    }

    public static function resizeHander($hander, $w = 320, $h = 240)
    {
        $api_key = env('FILESTACK_API_KEY');
        $resize = 'resize=width:' . $w . ',height:' . $h . ',fit:crop';
        $url = 'https://process.filestackapi.com/' . $api_key . '/' . $resize . '/' . $hander;

        return $url;
    }

    public static function resizeUrl($hander, $w = 320, $h = 240)
    {
        $api_key = env('FILESTACK_API_KEY');
        $resize = 'resize=width:' . $w . ',height:' . $h . ',fit:crop';
        $url = 'https://process.filestackapi.com/' . $api_key . '/' . $resize . '/' . $hander;

        return $url;
    }

    /*
     * Filestack Watermark
     * */
    public static function watermark($hander, $w = 320, $h = 240)
    {
        $api_key = env('FILESTACK_API_KEY');
        $resize = 'resize=width:' . $w . ',height:' . $h . ',fit:crop';
        //$wImage = 'ohlr0aJ6RDushqwjTulg';
        $wImage = 'bikKdunjQ9ubyLitiW80';
        $waterMark = 'watermark=file:' . $wImage . ',size:50,position:[bottom,right]';
        $url = 'https://process.filestackapi.com/' . $api_key . '/' . $resize . '/' . $waterMark . '/' . $hander;

        return $url;
    }

    public static function watermarkUrl($hander, $w = 320, $h = 240)
    {
        $api_key = env('FILESTACK_API_KEY');
        $resize = 'resize=width:' . $w . ',height:' . $h . ',fit:crop';
        //$wImage = 'ohlr0aJ6RDushqwjTulg';
        $wImage = 'bikKdunjQ9ubyLitiW80';
        $waterMark = 'watermark=file:' . $wImage . ',size:50,position:[bottom,right]';
        $url = 'https://process.filestackapi.com/' . $api_key . '/' . $resize . '/' . $waterMark . '/' . $hander;

        return $url;
    }

    /*
     * Filestack Watermark Thumbnail image
     * */
    public static function watermarkThumb($hander, $w = 320, $h = 240)
    {
        $api_key = env('FILESTACK_API_KEY');
        $resize = 'resize=width:' . $w . ',height:' . $h . ',fit:crop';
        $waterMark = 'watermark=file:bikKdunjQ9ubyLitiW80,size:50,position:[bottom,right]';
        $url = 'https://process.filestackapi.com/' . $api_key . '/' . $waterMark . '/' . $hander;

        return $url;
    }

}