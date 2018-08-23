<?php

namespace common\helpers;

use yii\web\View;

/**
 * FacebookAnalytics adds tracking code to the page if application is not in debug mode
 */
class FacebookAnalytics
{
    /**
     * Adds trackign code with tracking ID specified to the page
     *
     * @param string $id
     */
    public static function track($id)
    {
        if (YII_DEBUG) {
            return;
        }
        //Module User Not tracking
        $moduleId = \Yii::$app->controller->module->id;
        if ($moduleId == 'user') {
            return;
        }

        $js = <<<JS

 window.fbAsyncInit = function() {
    FB.init({
      appId            : '$id',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v3.0'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
JS;
        \Yii::$app->getView()->registerJs($js, View::POS_END);
    }
}
