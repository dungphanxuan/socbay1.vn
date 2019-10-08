<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 3/6/2018
 * Time: 9:42 AM
 */

namespace common\helpers;

/**
 * CloudinaryHelper
 *
 * @author dungphanxuan <dungphanxuan999@gmail.com>
 * @created 20190704
 */
class CloudinaryHelper
{
    public $base_url;

    public static function transformation()
    {

    }

    public static function resizingAndCropping($baseUrl, $public_id, $w = 320, $h = 240, $croping = 'scale')
    {
        $resize = 'w_' . $w . ',h_' . $h . ',c_' . $croping;
        $url = $baseUrl . '/' . $resize . '/' . $public_id;

        return $url;
    }
}