<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 1/5/2018
 * Time: 9:26 AM
 */

use frontend\assets\AdsAsset;
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

?>
<h5 class="list-title uppercase"><strong><a href="#"> Danh mục</a></strong></h5>
<ul class=" list-unstyled list-border ">
    <li><a href="<?php echo Url::to(['/blog/index', 'name' => 'mobile']) ?>"><span class="title">Electronics</span><span
                    class="count">&nbsp;8626</span></a>
    </li>
    <li><a href=""><span class="title">Automobiles </span><span
                    class="count">&nbsp;123</span></a>
    </li>
    <li><a href=""><span class="title">Property </span><span
                    class="count">&nbsp;742</span></a></li>
    <li><a href=""><span class="title">Services </span><span
                    class="count">&nbsp;8525</span></a>
    </li>
    <li><a href=""><span class="title">For Sale </span><span
                    class="count">&nbsp;357</span></a></li>
    <li><a href=""><span class="title">Learning </span><span
                    class="count">&nbsp;3576</span></a>
    </li>
</ul>
