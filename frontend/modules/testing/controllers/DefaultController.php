<?php

namespace frontend\modules\testing\controllers;

use backend\models\UserForm;
use common\helpers\PhoneNumber;
use common\models\Article;
use common\models\property\Project;
use common\models\User;
use yii\base\InvalidParamException;
use yii\db\Query;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\web\Controller;
use Yii;


/**
 * Default controller for the `testing` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex1()
    {
        $str = ' Stay With Me - Chanyeol, Punch - Goblin OST.mp4';
        dd(Inflector::slug($str));
    }

    public function actionFake2()
    {
        $data = User::find()->where(['like', 'username', 'demo'])->all();
        dd($data);

    }

    public function actionFake1()
    {
        $model = new UserForm();
        $model->setScenario('create');
        $model->username = 'demo2';
        $model->name = 'demo1';
        $model->user_kbn = 'demo1';
        $model->email = 'demo2@gmail.com';
        $model->status = 1;
        $model->roles = ['administrator'];
        $model->password = '1234$aA56';
        $a = $model->save();
        dd($a);
    }

    public function actionAssign()
    {
        $user = User::find()->where(['username' => 'demo1'])->one();
        if (!$user) {
            throw new InvalidParamException("There is no user \"$username\".");
        }

        $auth = Yii::$app->authManager;
        $roleObject = $auth->getRole('administrator');
        if (!$roleObject) {
            throw new InvalidParamException("There is no role \"$role\".");
        }
        dd($roleObject);

        $rolebyUser = \Yii::$app->authManager->getRolesByUser($user->id);

        if ($rolebyUser && $rolebyUser[$role]) {
            echo 'Already been assigned to user.';
        } else {
            $auth->assign($roleObject, $user->id);
            echo 'Assign done.';
        }
        dd('ok');

    }

    public function actionFake()
    {
        $data = common\models\User::find()->where(['like', 'username', 'u'])->asArray()->all();
        dd($data);
        $model = new UserForm();
        $model->setModel(User::findOne(1));
        $model->password = '123456';
        $model->save();
        dd('ok');
    }

    public function actionIndex()
    {
        phpinfo();

        dd(Yii::$app->getRequest()->getAbsoluteUrl());
        dd(Yii::getAlias('@web/frontend/web/themes'));

        dd(24 % 12);
        $number = '02987654321';
        $carrier = PhoneNumber::detect_number($number);
        dd($carrier); // Viettel
        dd('done');

        return $this->render('index');
    }

    public function actionCurency()
    {
        $price = 5000000;
        $a = number_format($price, 0, '.', ',') . ' ' . 'đ';;

        return $this->render('curency');

    }

    public function actionUppy()
    {
        return $this->render('uppy');
    }

    public function actionAlert()
    {
        return $this->render('alert');
    }

    public function actionMithrilJs()
    {
        return $this->render('mithril-js');
    }

    public function actionAlert2()
    {
        return $this->render('alert2');
    }


    public function actionBootboxjs()
    {
        return $this->render('bootboxjs');
    }

    public function actionArticleList()
    {
        $allArticle = Article::find()
            ->asArray()
            ->all();
        $count = 0;
        foreach ($allArticle as $item) {
            $count++;
        }


        return $this->render('all-article');
    }

    public function actionArticleList1()
    {
        $query = (new Query())
            ->from(Article::tableName())
            ->select('id, title')
            ->where(['status' => 1]);

        //->orderBy('id');

        $count = 0;
        foreach ($query->batch() as $users) {
            //dd($users);
            // $users is an array of 100 or fewer rows from the user table
            $count++;
        }


        return $this->render('all-article');
    }

    public function actionCity()
    {
        $pCity = Project::getAllCityCount(true);
        dd($pCity);
    }

    public function actionRand()
    {
        $max_value = 9999;
        $values = range(0, $max_value);
        $counter = $max_value;
        $num_rows = 10; //Best to move this out of the for loop so it doesn't recalculate every time through
        for ($i = 0; $i < $num_rows; $i++) {
            $rand_num = rand(1000, $counter);
            $current_number = $values[$rand_num];
            array_splice($values, $rand_num, 1);
            $counter--;
            echo "rand number: " . $current_number . '<br>';
        }
        dd('dfd');
    }

    public function actionCityList()
    {
        $pCity = Project::getCityList(true);
        dd($pCity);
    }


}
