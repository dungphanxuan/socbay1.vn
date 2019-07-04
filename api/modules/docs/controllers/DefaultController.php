<?php

namespace api\modules\docs\controllers;

use api\controllers\ApiController;
use yii\web\Controller;
use yii\helpers\Markdown;
use Yii;

/**
 * Default controller for the `docs` module
 */
class DefaultController extends ApiController
{
    public function init()
    {
        $this->is_html = 1;
        parent::init();
    }

    /**
     * Renders the index view for the module
     * @return string
     */

    public function actionIndex()
    {
        $docs = file_get_contents(\Yii::getAlias('@api/modules/docs/docs.md'));

        return $this->render('index', [
            'content' => Markdown::process($docs, 'gfm'),
        ]);
    }
}
