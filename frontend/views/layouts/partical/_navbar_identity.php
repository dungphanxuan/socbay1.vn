<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 4/7/2018
 * Time: 8:25 AM
 */

use yii\helpers\Url;

/* @var $this yii\web\View */

$urlLogo = \common\models\ads\AdsAssets::getAssets('logo');
if (empty($urlLogo)) {
    $urlLogo = Url::to('@web/frontend/web/images/') . 'logo1.png';
}
?>

    <a href="<?php echo Url::to(['/site/index']) ?>" class="navbar-brand logo logo-title">
        <img src="<?php echo $urlLogo ?>" alt="logo">
    </a>


    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggler pull-right"
            type="button">

        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30" width="30" height="30"
             focusable="false"><title>Menu</title>
            <path stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/>
        </svg>

    </button>

<?php
$app_css = <<<CSS
.navbar-brand.logo img{max-width: 180px;}
.navbar-brand.logo{padding-top: 10px;}

@media (max-width: 479px) {
    .navbar-site.navbar .navbar-identity .logo-title{
        padding-top: 10px;
    }
}
CSS;

//$this->registerCss($app_css);