<?php

namespace backend\modules\testing\controllers;

use Intervention\Image\ImageManagerStatic;
use yii\web\Controller;

/**
 * File controller for the `testing` module
 */
class FileController extends Controller
{
    /**
     * Renders the index view for the module
     */
    public function actionIndex()
    {
        $path = '2.jpg';
        $file = fileStorage()->getFilesystem()->read($path);
        $img = ImageManagerStatic::make($file)->fit(320, 220);
        fileStorage()->getFilesystem()->write('5.jpg', $img->encode());

        dd('Done');
    }
}
