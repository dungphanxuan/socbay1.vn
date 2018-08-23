<?php

namespace frontend\modules\testing\controllers;

use common\helpers\MyCrawler;
use common\helpers\PhoneNumber;
use common\models\Article;
use common\models\property\Project;
use yii\db\Query;
use yii\web\Controller;
use Yii;


/**
 * Crawler controller for the `testing` module
 */
class CrawlerController extends Controller
{
    public function actionIndex()
    {

        $crawler = new MyCrawler();
// URL to crawl
        $crawler->setURL("http://tinbds.com/tk/ha-noi/ha-dong");
// Only receive content of files with content-type "text/html"
        $crawler->addContentTypeReceiveRule("#text/html#");
// Ignore links to pictures, dont even request pictures
        // $crawler->addURLFilterRule("#\.(jpg|jpeg|gif|png)$# i");
// Store and send cookie-data like a browser does
        $crawler->enableCookieHandling(true);
// Set the traffic-limit to 1 MB (in bytes,
// for testing we dont want to "suck" the whole site)
        $crawler->setTrafficLimit(5000 * 1024);
// Thats enough, now here we go
        $crawler->go();
// At the end, after the process is finished, we print a short
// report (see method getProcessReport() for more information)
        $report = $crawler->getProcessReport();
        if (PHP_SAPI == "cli") $lb = "\n";
        else $lb = "<br />";

        echo "Summary:" . $lb;
        echo "Links followed: " . $report->links_followed . $lb;
        echo "Documents received: " . $report->files_received . $lb;
        echo "Bytes received: " . $report->bytes_received . " bytes" . $lb;
        echo "Process runtime: " . $report->process_runtime . " sec" . $lb;

        dd('done');
    }

    public function actionFind()
    {
        //initialise an empty array.
        $url = 'http://tinbds.com/tk/ha-noi/ha-dong';
        $string = MyCrawler::file_get_contents_curl($url);
        $matches = array();
        $matchesPhone = array();

        //regular expression that matches most email addresses, courtesy of @Eric-Karl.
        $pattern = '/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}/i';

        //perform global regular expression match, ie search the entire web page for a particular thing, and store it in the previously initialised array.
        preg_match_all($pattern, $string, $matches);

        //output array of values; remove duplicate email addresses, but maintain incremental key count.
        $neaterArray = (array_values(array_unique($matches[0])));
        dd($neaterArray);
    }
}
