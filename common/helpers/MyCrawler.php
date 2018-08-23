<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 4/13/2018
 * Time: 1:48 PM
 */

namespace common\helpers;


class MyCrawler extends \PHPCrawler
{
    function handleDocumentInfo1($DocInfo)
    {
        // Just detect linebreak for output ("\n" in CLI-mode, otherwise "<br>").
        if (PHP_SAPI == "cli") $lb = "\n";
        else $lb = "<br />";
        // Print the URL and the HTTP-status-Code
        echo "Page requested: " . $DocInfo->url . " (" . $DocInfo->http_status_code . ")" . $lb;

        // Print the refering URL
        echo "Referer-page: " . $DocInfo->referer_url . $lb;

        // Print if the content of the document was be recieved or not
        if ($DocInfo->received == true)
            echo "Content received: " . $DocInfo->bytes_received . " bytes" . $lb;
        else
            echo "Content not received" . $lb;

        // Now you should do something with the content of the actual
        // received page or file ($DocInfo->source), we skip it in this example

        echo $lb;

        flush();
    }

    // Các bạn cài đè phương thức handleDocumentInfo() để xử lý tất cả các thông tin thu tập được.
    function handleDocumentInfo(\PHPCrawlerDocumentInfo $DocInfo)
    {

        // Lấy toàn bộ url của website
        echo "Page requested: " . $DocInfo->url . "</br></br>";
        //Find Email

        flush();
    }

    public static function file_get_contents_curl($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }
}