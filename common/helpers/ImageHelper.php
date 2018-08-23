<?php

namespace common\helpers;


/**
 * Collection of useful helper functions for Yii Applications
 *
 * @author dungphanxuan <dungphanxuan999@gmail.com>
 * @since  1.0
 *
 */
class ImageHelper
{

    /*
     * Sign Image
     * */
    public static function getImageSignUrl($path, $q)
    {
        $param = [
            'glide/index',
            'path' => $path,
            'q'    => $q
        ];

        return \Yii::$app->glide->createSignedUrl($param);
    }

    /*
     * Sign Image With Quality
     * */
    public static function getImageSignUrl1($path, $q, $w, $h)
    {
        $param = [
            'glide/index',
            'path' => $path,
            'q'    => $q,
            'w'    => $w,
            'h'    => $h
        ];

        return \Yii::$app->glide->createSignedUrl($param);
    }
}