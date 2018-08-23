<?php
/**
 * Created by PhpStorm.
 * User: dungphanxuan
 * Date: 5/12/2017
 * Time: 9:50 AM
 */

/* @var $this yii\web\View */
/* @var $name */
$data = file_get_contents(Yii::getAlias('@storage/xml/') . $name . '.xml');

echo $data;
?>