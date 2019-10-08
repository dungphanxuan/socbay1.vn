<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 10/5/2017
 * Time: 9:41 AM
 */

namespace common\components;


use Facebook\Exceptions\FacebookResponseException;
use Facebook\Facebook;
use Facebook\FacebookResponse;
use yii\base\Component;

class FacebookComponent extends Component
{
    /**
     * @var string
     */
    public $appId;
    /**
     * @var string
     */
    public $secret;
    public $scope;
    /**
     * @var string
     */
    private $session;
    /**
     * @var string
     */
    private $access_token;

    /**
     * @var Facebook
     */
    private $fb;

    public function init()
    {
        parent::init();

        $this->fb = new Facebook([
            'app_id' => $this->appId,
            'app_secret' => $this->secret,
            'default_graph_version' => 'v2.10',
        ]);

        $this->access_token = $this->fb->getApp()->getAccessToken();
        $this->session = '';
        if (isset($this->access_token)) {
            $this->session = $this->access_token->getValue();
        }
    }

    public function feedPage($id)
    {
        # GET request in v5
        $response = null;
        $data = [];
        $field = 'type,full_picture,link,created_time,name,message';
        $limit = 10;
        try {
            /** @var FacebookResponse $response */
            $response = $this->getFb()->get('/' . $id . '/posts?limit=' . $limit . '&fields=' . $field, $this->session);
        } catch (FacebookResponseException $e) {
            \Yii::warning($e->getMessage(), 'facebook');
        }
        if ($response) {
            $data = $response->getDecodedBody()['data'];
        }

        return $data;
    }

    public function feedAlbum()
    {

    }

    /**
     * @return mixed
     */
    public function getFb()
    {
        return $this->fb;
    }

    /**
     * @param mixed $fb
     */
    public function setFb($fb)
    {
        $this->fb = $fb;
    }


}