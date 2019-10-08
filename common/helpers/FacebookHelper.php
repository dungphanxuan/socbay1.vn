<?php

namespace common\helpers;

/**
 * Created by PhpStorm.
 * User: developer
 * Date: 4/11/2016
 * Time: 11:30 AM
 */

use Facebook\Exceptions\FacebookResponseException;
use Facebook\Facebook;
use yii\helpers\Inflector;


class FacebookHelper extends Inflector
{
    /*
    * Feed User Info
    * */
    public static function feedUser($token)
    {
        $dataUser = [];
        $fb = new \Facebook\Facebook([
            'app_id' => env('FACEBOOK_CLIENT_ID'),
            'app_secret' => env('FACEBOOK_CLIENT_SECRET'),
            'default_graph_version' => 'v2.10',
            'default_access_token' => $token
        ]);

        try {
            $response = $fb->get('/me?fields=id,name,email,birthday,picture', $token);
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            //echo 'Graph returned an error: ' . $e->getMessage();
            return $dataUser;
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            //echo 'Facebook SDK returned an error: ' . $e->getMessage();
            return $dataUser;
        }

        $me = $response->getGraphUser();

        //dd($me->getEmail());

        $userPicture = $me->getPicture();
        $dataUser = [
            'id' => $me->getId(),
            'email' => $me->getEmail(),
            'fullname' => $me->getName(),
            'birthday' => $me->getBirthday(),
            'picture' => isset($userPicture) ? $me->getPicture()->getUrl() : '',
        ];

        return $dataUser;
    }


    /*
     * Feed page post
     * */
    public static function feedPage($id = '')
    {

        $fb = new Facebook([
            'app_id' => env('FACEBOOK_CLIENT_ID'),
            'app_secret' => env('FACEBOOK_CLIENT_SECRET'),
            'default_graph_version' => 'v2.10',
        ]);

        $access_token = $fb->getApp()->getAccessToken();
        $app_session = '';
        if (isset($access_token)) {
            $app_session = $access_token->getValue();
        }
        //dd($app_session);

        # GET request in v5
        $response = null;
        $field = 'type,full_picture,link,created_time,name,message';
        try {
            $response = $fb->get('/' . $id . '/posts?limit=8&fields=' . $field, $app_session);
        } catch (FacebookResponseException $e) {
            \Yii::warning($e->getMessage(), 'facebook');
        }
        if ($response) {
            $data = $response->getDecodedBody()['data'];
        } else {
            $data = array();
        }

        return $data;

    }

    /*
     * Get Album photo
     * */
    public static function feedAlbumPhoto($id = '')
    {
        $fb = new Facebook([
            'app_id' => env('FACEBOOK_CLIENT_ID'),
            'app_secret' => env('FACEBOOK_CLIENT_SECRET'),
            'default_graph_version' => 'v2.10',
        ]);

        $access_token = $fb->getApp()->getAccessToken();
        $app_session = '';
        if (isset($access_token)) {
            $app_session = $access_token->getValue();
        }
        //dd($app_session);

        # GET request in v5
        $response = null;
        $field = 'picture,name,images';
        $limit = 10;
        try {
            $response = $fb->get('/' . $id . '/photos?limit=' . $limit . '&fields=' . $field, $app_session);
        } catch (FacebookResponseException $e) {
            \Yii::warning($e->getMessage(), 'facebook');
        }
        if ($response) {
            $data = $response->getDecodedBody();
        } else {
            $data = array();
        }

        //dd($data);

        return $data;

    }
}