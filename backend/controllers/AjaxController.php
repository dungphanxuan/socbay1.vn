<?php

namespace backend\controllers;

use common\helpers\CurlHelper;
use common\helpers\StringHelper;
use common\models\Article;
use dungphanxuan\vnlocation\models\City;
use dungphanxuan\vnlocation\models\District;
use dungphanxuan\vnlocation\models\Ward;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * AjaxController handles several ajax actions in the background
 */
class AjaxController extends BackendController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class'        => AccessControl::class,
                'rules'        => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function () {
                    if (Yii::$app->user->getIsGuest()) {
                        // redirect the site to login when someone clicks on a button that needs login
                        Yii::$app->user->loginRequired(true, false);
                    } else {
                        throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
                    }
                }
            ],
            'verbs'  => [
                'class'   => VerbFilter::class,
                'actions' => [
                    'vote' => ['post'],
                    'star' => ['post'],
                    //'search' => ['post']
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        return parent::beforeAction($action);
    }


    /**
     * Casts a star to the specified content object.
     *
     * @param string  $type the model type to add the star.
     * @param integer $id   the ID of the model.
     *
     * @return array
     * @throws NotFoundHttpException
     */
    public function actionSearch()
    {
        $index = 0;
        $results = [];
        $getKeyword = getParam('keyword', null);
        $modelArticle = Article::find()
            ->limit(10)
            ->where(['like', 'title', $getKeyword])
            ->all();

        foreach ($modelArticle as $key => $article) {
            $item = [];
            $item['id'] = $article->id;
            $item['name'] = StringHelper::truncate($article->title, 30);
            $item['type'] = 'Article';
            $item['color'] = '#f5bd65';
            $item['href'] = Url::to(['/article/update', 'id' => $article->id]);
            $results[] = (object)$item;
        }
        //Find by id

        //$results[$index] = $dataArticle;

        return $results;
    }


    public function actionMapInfo()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            $curl = new CurlHelper();
            $add1 = getParam('add1');
            $add2 = getParam('add2');
            $add3 = getParam('add3');

            //100-8111
            $url = 'http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($add1 . '+' . $add2 . '+' . $add3) . '&sensor=false';
            $response = $curl->get($url);
            $data = json_decode($response);

            $item = array();
            $isSuccess = false;
            if ($data->status == 'OK') {
                $item = $data->results[0]->geometry->location;
                $isSuccess = true;
            }
            $res = array(
                'body'    => $item,
                'success' => $isSuccess,
            );
        } else {
            $res = array(
                'body'    => 'Not allow',
                'success' => false,
            );
        }

        return $res;
    }

    /*
     * Location
     * */
    public function actionLatLocation()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            $curl = new CurlHelper();
            $getType = getParam('type');
            $getId = getParam('tid');

            $dataLocation = array();
            $isSuccess = false;

            switch ($getType) {
                case 1:
                    $modelCity = City::find()->where(['id' => $getId])->one();
                    if ($modelCity) {
                        $isSuccess = true;
                        $dataLocation = [
                            'lat' => $modelCity->lat,
                            'lng' => $modelCity->lng,
                        ];
                    }
                    break;
                case 2:
                    $modelDistrict = District::find()->where(['id' => $getId])->one();
                    if ($modelDistrict) {
                        $isSuccess = true;
                        $dataLocation = [
                            'lat' => $modelDistrict->lat,
                            'lng' => $modelDistrict->lng,
                        ];
                    }
                    break;
                case 3:
                    $modelWard = Ward::find()->where(['id' => $getId])->one();
                    if ($modelWard) {
                        $isSuccess = true;
                        $dataLocation = [
                            'lat' => $modelWard->lat,
                            'lng' => $modelWard->lng,
                        ];
                    }
                    break;
                default:
            }


            $res = array(
                'body'    => $dataLocation,
                'success' => $isSuccess,
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
