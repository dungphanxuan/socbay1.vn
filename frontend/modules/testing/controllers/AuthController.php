<?php

namespace frontend\modules\testing\controllers;

use common\helpers\FacebookHelper;
use common\helpers\PhoneNumber;
use common\models\Article;
use common\models\property\Project;
use yii\db\Query;
use yii\web\Controller;
use Yii;

/**
 * Auth controller for the `testing` module
 */
class AuthController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        /* @var $client  yii\authclient\clients\Facebook \ */
        $client = Yii::$app->authClientCollection->getClient('facebook');

        $request = $client->createRequest()
            ->setMethod('GET')
            ->setUrl('users');

        $myAccessToken = 'EAACBZC1Y38sUBAJXo5zZAGhsAyP7ggbOss0ZA6TPli9yYEW8593bO69rCSqdSO93Mbq9g8UshLpgXyC0wliNztfNCA4yU7DxsbzRzpxLMduMbDCzRyZBAh5iLFXgikQm5lflf4kk4005wA098qZBAOYOSzLrOAY5E8BPFBVYGnrdpqxYunk4skYHRqRZB1xKGprVMYp6AO8wZDZD';
        $client->applyAccessTokenToRequest($request, $myAccessToken); // use custom access token for API
        $client->signRequest($request, $myAccessToken); // sign request with custom access token

        $response = $request->send();
        dd($response);

        return $this->render('index');
    }

    public function actionMe()
    {
        $tokenAuth = 'EAACBZC1Y38sUBAMzeAuzd9e3h1lmtGNccITTOwKNnEz8QilDTFPoehK0oOJZA2kRmTQjESXVP43g8dxi6BKqKgZBkH4PAJvz38DuX4q2AgY20nxfJhQzSXILQkunYKtd0afIXmH5RtNMZCKqTVitDeZAugf0SZCZBYdfVrhWW8hfvZBjDlpSZAs6Lbun9omsbnDd9tcwOyAgRxAZDZD';
        $userInfo = FacebookHelper::feedUser($tokenAuth);

        dd($userInfo);
    }


}
