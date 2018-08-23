<?php

namespace backend\modules\testing\controllers;

use common\models\Article;
use PHPHtmlParser\Dom;
use yii\web\Controller;

/**
 * Default controller for the `testing` module
 */
class CrawlController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet1()
    {
        $dom = new Dom();
        $dom->load('<div class="all"><p>Hey bro, <a href="google.com">click here</a><br /> :)</p></div>');
        $a = $dom->find('a')[0];
        echo $a->text; // "click here"

        dd('done');

        return $this->render('index');
    }

    public function actionGetUrl()
    {
        $dom = new Dom;
        $dom->load('http://science-technology.vn/?p=1985');
        //$html = $dom->outerHtml;
        //$a = $dom->getElementsByClass('page-header');
        $a = $dom->getElementsByClass('entry-content');
        //dd(count($a[0]));
        //Title
        $title = $dom->getElementsByClass('page-header');

        $text = $title[0]->innerHtml;
        dd($this->getTitleText($text));

        //Content
        $model = Article::find()->one();
        $model->body = $a[0]->outerHtml;
        $model->save();
        //dd($a[0]->outerHtml);

        //echo $a->text; // "click here"
        dd('done');

        return $this->render('index');
    }

    public function actionGetList()
    {
        $dom = new Dom;
        $dom->load('http://science-technology.vn/?page_id=3539');
        //$html = $dom->outerHtml;
        //$a = $dom->getElementsByClass('page-header');
        $a = $dom->getElementsByClass('entry-content');
        //dd(count($a[0]));

        $allC = $a[0]->innerHtml;

        //dd($allC);
        $dom->load($allC);
        $a1 = $dom->find('td');

        //dd(count($a1));

        foreach ($a1 as $key => $content) {

            if ($key % 2 == 0) {
                // do something with the html
                $html = $content->innerHtml;

                echo $html . '<br>';
            }

            // or refine the find some more
            //$child   = $content->firstChild();
            //$sibling = $child->nextSibling();
        }
        echo $a1->text; //
        dd('done');

        return $this->render('index');
    }

    protected function getTitleText($html)
    {

        $dom = new Dom;
        $dom->load($html);
        $a = $dom->find('a')[0];

        return $a->text; // "click here"
    }
}
