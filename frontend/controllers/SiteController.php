<?php

namespace frontend\controllers;

use common\models\Article;
use common\models\ArticleCategory;
use Yii;
use frontend\models\ContactForm;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use cheatsheet\Time;
use common\sitemap\ArticleUrlGenerator;
use common\sitemap\PageUrlGenerator;
use common\sitemap\UrlsIterator;
use Sitemaped\Element\Urlset\Urlset;
use Sitemaped\Sitemap;
use yii\filters\PageCache;
use yii\web\BadRequestHttpException;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends FrontendController
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class'    => PageCache::class,
                'only'     => ['sitemap'],
                'duration' => Time::SECONDS_IN_AN_HOUR,
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error'      => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha'    => [
                'class'           => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ],
            'set-locale' => [
                'class'   => 'common\actions\SetLocaleAction',
                'locales' => array_keys(Yii::$app->params['availableLocales'])
            ]
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $dataCategory = ArticleCategory::getList(null, false, 12);

        $queryPickup = Article::find()
            ->published()
            ->limit(20);

        $catProvider = new ArrayDataProvider([
            'allModels'  => $dataCategory,
            'pagination' => [
                'pageSize' => 12,
            ],
            'sort'       => [
                'attributes' => ['id', 'sort_number'],
            ],
        ]);

        $pickupProvider = new ActiveDataProvider([
            'query'      => $queryPickup,
            'pagination' => [
                'pageSize' => 12,
            ],
            'sort'       => [
                'defaultOrder' => [
                    'sort_number' => SORT_ASC,
                ]
            ],
        ]);

        return $this->render('index', [
            'catProvider'    => $catProvider,
            'pickupProvider' => $pickupProvider
        ]);
    }

    public function actionProperty()
    {
        return $this->render('property', [
        ]);
    }

    public function actionSubscribed()
    {

        echo "Done";
    }

    public function actionUnSubscribed()
    {

        echo "Done";
    }

    /**
     * @return string|Response
     */
    public function actionContact()
    {
        $model = new ContactForm();
        //$model->subject = 1;
        if ($model->load(Yii::$app->request->post())) {
            if ($model->contact(Yii::$app->params['adminEmail'])) {
                Yii::$app->getSession()->setFlash('alert', [
                    'body'    => Yii::t('frontend', 'Thank you for contacting us. We will respond to you as soon as possible.'),
                    'options' => ['class' => 'alert-success']
                ]);

                return $this->refresh();
            } else {
                Yii::$app->getSession()->setFlash('alert', [
                    'body'    => \Yii::t('frontend', 'There was an error sending email.'),
                    'options' => ['class' => 'alert-danger']
                ]);
            }
        }

        return $this->render('contact', [
            'model' => $model
        ]);
    }

    /**
     * @param string $format
     * @param bool $gzip
     * @return string
     */
    public function actionSitemap($format = Sitemap::FORMAT_XML, $gzip = false)
    {
        $links = new UrlsIterator();
        $sitemap = new Sitemap(new Urlset($links));
        Yii::$app->response->format = Response::FORMAT_RAW;
        if ($gzip === true) {
            Yii::$app->response->headers->add('Content-Encoding', 'gzip');
        }
        if ($format === Sitemap::FORMAT_XML) {
            Yii::$app->response->headers->add('Content-Type', 'application/xml');
            $content = $sitemap->toXmlString($gzip);
        } else if ($format === Sitemap::FORMAT_TXT) {
            Yii::$app->response->headers->add('Content-Type', 'text/plain');
            $content = $sitemap->toTxtString($gzip);
        } else {
            throw new BadRequestHttpException('Unknown format');
        }
        $linksCount = $sitemap->getCount();
        if ($linksCount > 50000) {
            Yii::warning(\sprintf('Sitemap links count is %d'), $linksCount);
        }
        return $content;
    }
}
