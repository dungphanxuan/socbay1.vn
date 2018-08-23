<?php

namespace backend\modules\property\controllers;

use common\models\property\Project;
use Yii;
use yii\helpers\Inflector;
use yii\web\Controller;
use yii\web\Response;

/**
 * Default controller for the `property` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        //Project::updateAll(['city_id' => 3]);
        return $this->render('index');
    }

    public function actionProjectData()
    {
        return $this->render('project-data');
    }

    public function actionAjaxStore()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            $add1 = postParam('text', null);

            if ($add1) {
                $pProject = Project::find()->where(['like', 'title', $add1])->one();
                if (true) {
                    $model = new Project();
                    $model->title = $add1;
                    $model->body = $add1;
                    $model->slug = Inflector::slug($add1);
                    $model->status = 1;
                    //$model->city_id = 2; //Hà Nội
                    //$model->city_id = 65; //Đà nẵng

                    $model->city_id = 3; //Hồ Chí Minh

                    $model->save(false);
                }
            }
            $res = array(
                'body'    => true,
                'success' => true,
            );
        } else {
            $res = array(
                'body'    => 'Not allow',
                'success' => false,
            );
        }

        return $res;
    }

}
