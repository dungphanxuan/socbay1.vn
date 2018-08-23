<?php

namespace common\helpers;


/**
 * Collection of useful helper functions for Yii Applications
 *
 * @author dungphanxuan <dungphanxuan999@gmail.com>
 * @since  1.0
 *
 */
class DateHelper
{
    /*
     * Format date from timestamp
     * */
    public static function _substr($str, $length, $minword = 3)
    {
        $sub = '';
        $len = 0;
        foreach (explode(' ', $str) as $word) {
            $part = (($sub != '') ? ' ' : '') . $word;
            $sub .= $part;
            $len += strlen($part);
            if (strlen($word) > $minword && strlen($sub) >= $length) {
                break;
            }
        }

        return $sub . (($len < strlen($str)) ? '...' : '');
    }

    public static function getShowDate($t)
    {
        return date('d', $t) . ' thg ' . date('n', $t) . ', ' . date('Y', $t);
    }

}