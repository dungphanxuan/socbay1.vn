<?php

namespace frontend\controllers;

use common\dictionaries\ArticleStatus;
use common\dictionaries\ArticleType;
use frontend\models\search\FileStorageItemSearch;
use common\models\Article;
use common\models\FileStorageItem;
use common\models\system\Star;
use common\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/*
 * Class AccountController
 * Type: 1. All Ads 2. Favourite 3. Archive 4. Pending
 * */

class AccountController extends FrontendController
{
    public function behaviors()
    {
        return \yii\helpers\ArrayHelper::merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'only' => ['ads', 'favourite', 'archived', 'saved', 'pedding'],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            /* 'modelAccess' => [
                 'class' => OwnModelAccessFilter::class,
                 'only'  => ['view', 'update', 'delete'],

                 'modelCreatedByAttribute' => 'created_by',
                 'modelClass'              => Article::class
             ],*/
        ]);
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @return string
     */
    public function actionAds()
    {
        //Article::updateAll( ['created_by' => 5],['in', 'id', [2]]);
        $user_id = \Yii::$app->user->id;
        $query = Article::find()
            //->published()
            ->byUser($user_id)
            ->orderBy('id desc');

        $getTitle = getParam('title', null);
        $getShow = getParam('show', null);
        if (!empty($getTitle)) {
            $query->andWhere(['like', 'title', $getTitle]);
        }

        //$pageSize = Yii::$app->keyStorage->get('list.adssize');
        $pageSize = 15;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $pageSize,
            ],
        ]);

        $view = 'ads';

        return $this->render('ads', [
            'dataProvider' => $dataProvider,
            'type' => 1,
            'is_show' => $getShow
        ]);
    }

    /**
     * @return string
     */
    public function actionFavourite()
    {
        $user_id = \Yii::$app->user->id;
        $query = Article::find()
            //->published()
            //->byUser($user_id)
            ->leftJoin('{{%star}}', '`tbl_star`.`object_id` = `tbl_article`.`id`  AND `tbl_star`.`star` = 1 ')
            ->leftJoin('{{%user}}', '`tbl_star`.`user_id` = `tbl_user`.`id` ')
            ->andWhere(['{{%user}}.id' => $user_id])
            ->orderBy('id desc');

        //Filter by title
        $getTitle = getParam('title', null);
        if (!empty($getTitle)) {
            $query->andWhere(['like', 'tbl_article.title', $getTitle]);
        }
        $pageSize = Yii::$app->keyStorage->get('list.adssize');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $pageSize,
            ],
        ]);

        $view = 'ads';

        return $this->render('ads', [
            'dataProvider' => $dataProvider,
            'type' => 2,
            'is_show' => 0
        ]);
    }

    /*
     * Remover Favourite Ads
     * */
    public function actionRemoverFavourite($id, $type = 1)
    {
        /** @var \common\models\system\ActiveRecord $model */
        $model = $this->findArticleModel($id);
        Star::castStar($model, Yii::$app->user->id, 0);

        if ($type = 2) {
            // $allIds =
        }

        $this->redirect(['/account/favourite']);
    }

    public function actionView()
    {
        return $this->render('view');
    }

    /**
     * @return string
     */
    public function actionSellerProfile($id = null)
    {
        /** @var User $modelUser */
        $modelUser = User::find()->where(['id' => $id])->one();

        if (!$modelUser) {
            throw new NotFoundHttpException('Không tìm thấy thành viên.');
        }
        $query = Article::find()
            ->byUser($id)
            //->published()
            ->orderBy('id desc');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        //dd($modelUser->userProfile);
        $view = 'seller-profile';
        return $this->render('seller-profile', [
            'dataProvider' => $dataProvider,
            'modelUser' => $modelUser,
        ]);
    }

    /**
     * @return string
     */
    public function actionSaved()
    {
        return $this->render('saved');
    }

    /**
     * Lists all FileStorageItem models.
     * @return mixed
     */
    public function actionFileStorage()
    {
        $searchModel = new FileStorageItemSearch();

        $params = Yii::$app->request->queryParams;
        $userId = Yii::$app->user->id;

        $params['FileStorageItemSearch']['created_by'] = $userId;

        $dataProvider = $searchModel->search($params);
        $dataProvider->sort = [
            'defaultOrder' => ['created_at' => SORT_DESC]
        ];
        $components = \yii\helpers\ArrayHelper::map(
            FileStorageItem::find()->select('component')->distinct()->all(),
            'component',
            'component'
        );
        $totalSize = FileStorageItem::find()->where(['created_by' => $userId])->sum('size') ?: 0;
        $dataProvider->pagination->pageSize = 10;

        return $this->render('file-storage', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'components' => $components,
            'totalSize' => $totalSize
        ]);
    }

    /**
     * @return string
     */
    public function actionDashboard()
    {
        return $this->render('dashboard');
    }

    /**
     * @return string
     */
    public function actionMessage()
    {
        return $this->render('message');
    }

    /**
     * @return string
     */
    public function actionArchived()
    {
        $user_id = \Yii::$app->user->id;
        $query = Article::find()
            //->published()
            ->byUser($user_id)
            ->orderBy('id desc');

        //Filter by title
        $getTitle = getParam('title', null);
        if (!empty($getTitle)) {
            $query->andWhere(['like', 'tbl_article.title', $getTitle]);
        }

        $pageSize = Yii::$app->keyStorage->get('list.adssize');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $pageSize,
            ],
        ]);

        $view = 'ads';

        return $this->render('ads', [
            'dataProvider' => $dataProvider,
            'type' => 3,
            'is_show' => 0
        ]);
    }

    /**
     * @return string
     */
    public function actionPending()
    {
        $user_id = \Yii::$app->user->id;
        $query = Article::find()
            //->published()
            ->andWhere(['status' => ArticleStatus::PENDING])
            ->byUser($user_id)
            ->orderBy('id desc');

        //Filter by title
        $getTitle = getParam('title', null);
        if (!empty($getTitle)) {
            $query->andWhere(['like', 'tbl_article.title', $getTitle]);
        }

        $pageSize = Yii::$app->keyStorage->get('list.adssize');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $pageSize,
            ],
        ]);

        $view = 'ads';

        return $this->render('ads', [
            'dataProvider' => $dataProvider,
            'type' => 4,
            'is_show' => 0
        ]);
    }

    /**
     * @return string
     */
    public function actionClose()
    {
        return $this->render('close');
    }

    /**
     * @return string
     */
    public function actionTicket()
    {
        return $this->render('ticket');
    }

    /**
     * @return string
     */
    public function actionCompany()
    {
        return $this->render('message');
    }

    /**
     * @return string
     */
    public function actionStatements()
    {
        return $this->render('statements');
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findArticleModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
