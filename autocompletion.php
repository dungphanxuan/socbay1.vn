<?php

/**
 * Yii bootstrap file.
 * Used for enhanced IDE code autocompletion.
 * Note: To avoid "Multiple Implementations" PHPStorm warning and make autocomplete faster
 * exclude or "Mark as Plain Text" vendor/yiisoft/yii2/Yii.php file
 */
class Yii extends \yii\BaseYii
{
    /**
     * @var BaseApplication|WebApplication|ConsoleApplication the application instance
     */
    public static $app;
}

/**
 * Class BaseApplication
 * Used for properties that are identical for both WebApplication and ConsoleApplication
 *
 * @property common\components\filekit\FileStorage        $fileStorage
 * @property common\components\keyStorage\KeyStorage      $keyStorage
 * @property yii\web\UrlManager                           $urlManagerFrontend UrlManager for frontend application.
 * @property yii\web\UrlManager                           $urlManagerBackend  UrlManager for backend application.
 * @property yii\web\UrlManager                           $urlManagerStorage  UrlManager for storage application.
 * @property yii\web\UrlManager                           $urlManagerApi      UrlManager for api application.
 * @property \yii\caching\Cache                           $cache              The cache application component. Null if the component is not enabled.
 * @property \yii\caching\Cache                           $dcache             The data cache application component. Null if the component is not enabled.
 * @property \yii\caching\Cache                           $scache             The data cache application component. Null if the component is not enabled.
 * @property trntv\glide\components\Glide                 $glide
 * @property trntv\bus\CommandBus                         $commandBus
 * @property common\components\RedisConnection            $redis
 * @property common\components\SlackComponent             $slack
 * @property yii\queue\db\Queue                           $queue
 * @property \common\components\google\VisionComponent    $vision
 * @property \common\components\google\StorageComponent   $cloudStorage
 * @property \common\components\cloud\CloudinaryComponent $cloudinary
 * @property \common\components\FilestackComponent        $fileStack
 * @property \yii\mail\MailerInterface                    $mailer             The mailer application component. This property is read-only.
 * @property \yii\mail\MailerInterface                    $mailerSg           The mailer application component. This property is read-only.
 * @property \kartik\report\Report $report           The mailer application component. This property is read-only.
 */
abstract class BaseApplication extends yii\base\Application
{
}

/**
 * Class WebApplication
 * Include only Web application related components here
 *
 * @property User $user User component.
 */
class WebApplication extends yii\web\Application
{
}

/**
 * Class ConsoleApplication
 * Include only Console application related components here
 */
class ConsoleApplication extends yii\console\Application
{
}

/**
 * User component
 * Include only Web application related components here
 *
 * @property \common\models\User $identity User model.
 * @method \common\models\User getIdentity() returns User model.
 */
class User extends \yii\web\User
{
}