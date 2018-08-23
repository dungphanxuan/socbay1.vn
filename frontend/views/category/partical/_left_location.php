<?php

use common\helpers\LocationHelper;

/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/14/2017
 * Time: 11:36 AM
 */

$dataLocation = LocationHelper::getAllCity();
?>
<li><a href="#" title="">All Cities</a></li>
<?php foreach ($dataLocation as $key => $item): ?>
    <li><a href="#" title="<?php echo $item['name'] ?>"><?php echo $item['name'] ?></a></li>
<?php endforeach; ?>

