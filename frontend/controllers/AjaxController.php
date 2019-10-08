<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/13/2017
 * Time: 10:54 AM
 */

namespace frontend\controllers;


use common\helpers\CurlHelper;
use common\models\ads\AdsReport;
use common\models\ArticleCategory;
use common\models\base\ActiveRecord;
use common\models\system\Rating;
use common\models\system\Star;
use dungphanxuan\vnlocation\models\District;
use dungphanxuan\vnlocation\models\Ward;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Inflector;
use yii\helpers\Json;
use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class AjaxController extends Controller
{

    public $enableCsrfValidation = false;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['vote', 'star'],
                'rules' => [
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
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'vote' => ['post'],
                    'star' => ['post']
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
     * Casts a user vote up/down on an item, e.g. a comment
     *
     * @param string $type the model type to add the vote for e.g. "Comment"
     * @param integer $id the ID of the model.
     * @param integer $vote 1 for upvote, 0 for downvote
     * @return array updated vote count for that model
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionVote($type, $id, $vote)
    {
        $userVote = $vote ? 1 : 0;
        if (in_array($type, Rating::$modelClasses, true)) {
            /** @var $modelClass ActiveRecord */
            $modelClass = "common\\models\\$type";
            $model = $modelClass::findOne((int)$id);
        }
        if (!isset($model)) {
            throw new NotFoundHttpException();
        }

        // check if user has already voted
        /** @var $userRating Rating */
        $userRating = Rating::find()->where(['object_type' => $type, 'object_id' => $id, 'user_id' => Yii::$app->user->id])->one();
        if ($userRating !== null && $userRating->rating == $userVote) {
            $userRating->delete();
            list($total, $up) = Rating::getVotes($model);
            $userVote = -1;
        } else {
            list($total, $up) = Rating::castVote($model, Yii::$app->user->id, $userVote);
        }

        return [
            'up' => $up,
            'down' => $total - $up,
            'total' => $total,
            'userVote' => $userVote,
        ];
    }

    /**
     * Casts a star to the specified content object.
     *
     * @param string $type the model type to add the star.
     * @param integer $id the ID of the model.
     *
     * @return array
     * @throws NotFoundHttpException
     */
    public function actionStar($type, $id)
    {
        $model = null;
        $type = ucfirst($type);
        if (in_array($type, Star::$modelClasses, true)) {
            /** @var $modelClass ActiveRecord */
            $modelClass = "common\\models\\$type";
            $model = $modelClass::findOne($id);
        }

        if ($model === null) {
            throw new NotFoundHttpException();
        }

        $star = Star::castStar($model, Yii::$app->user->id);
        $starCount = Star::getStarCount($model);

        return [
            'star' => $star,
            'starCount' => $starCount
        ];
    }

    // THE DistrictSubcat Action
    public function actionDistrictSubcat()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];

                $out = District::find()
                    ->where(['city_id' => $cat_id])
                    ->asArray()
                    ->all();
                $data = [];
                foreach ($out as $item) {
                    $dataDistrict = [];
                    $dataDistrict['id'] = $item['id'];
                    $dataDistrict['name'] = $item['name'];
                    $data[] = $dataDistrict;
                }
                echo Json::encode(['output' => $data, 'selected' => '']);

                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    // THE WardSubcat Action
    public function actionWardSubcat()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];

                $out = Ward::find()
                    ->where(['district_id' => $cat_id])
                    ->asArray()
                    ->all();
                $data = [];
                foreach ($out as $item) {
                    $dataDistrict = [];
                    $dataDistrict['id'] = $item['id'];
                    $dataDistrict['name'] = $item['name'];
                    $data[] = $dataDistrict;
                }
                echo Json::encode(['output' => $data, 'selected' => '']);

                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    // THE SubCat Action
    public function actionCategorySubcat()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];

                $out = ArticleCategory::find()
                    ->where(['status' => 1])
                    ->andWhere(['parent_id' => $cat_id])
                    ->asArray()
                    ->all();
                $data = [];
                foreach ($out as $item) {
                    $dataDistrict = [];
                    $dataDistrict['id'] = $item['id'];
                    $dataDistrict['name'] = $item['title'];
                    $data[] = $dataDistrict;
                }

                return ['output' => $data, 'selected' => ''];

            }
        }
        return ['output' => '', 'selected' => ''];
    }

    public function actionAdsReport()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            $model = new AdsReport();
            $model->load(Yii::$app->request->post());
            if ($model->validate()) {
                $model->status = 1;
                $model->save();

                $res = [
                    'body' => print_r($_POST, true),
                    'success' => true,
                ];
            } else {
                $res = [
                    'msg' => 'Error',
                    'success' => false,
                ];
            }


            return $res;
        }
    }

    public function actionMapInfo()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            $curl = new CurlHelper();
            $add = postParam('add');

            //100-8111
            $url = 'http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($add) . '&sensor=false';
            $response = $curl->get($url);
            $data = json_decode($response);

            $item = array();
            $isSuccess = false;
            if ($data->status == 'OK') {
                $item = $data->results[0]->geometry->location;
                $isSuccess = true;
            }
            $res = array(
                'body' => $item,
                'success' => $isSuccess,
            );

        } else {
            $res = array(
                'body' => 'Not allow',
                'success' => false,
            );
        }

        return $res;
    }

}