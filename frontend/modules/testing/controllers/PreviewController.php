<?php

namespace frontend\modules\testing\controllers;

use common\helpers\PhoneNumber;
use common\models\Article;
use common\models\property\Project;
use yii\db\Query;
use yii\web\Controller;
use Yii;


/**
 * Default controller for the `testing` module
 */
class PreviewController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionInvoice()
    {
        // $this->layout = '@frontend/views/layouts/';
        return $this->render('invoice');
    }


}
