<?php

namespace console\controllers;

use common\models\Article;
use common\models\ArticleCategory;
use Yii;
use yii\console\Controller;
use yii\helpers\Console;
use common\helpers\MediaHelper;
use common\helpers\YoutubeHelper;
use Madcoda\Youtube;
use yii\helpers\Inflector;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class MediaController extends Controller
{

    /*
     * Real Data
     * Article Cache
     * Count Article Category
     * Count
     *
     * */
    public function actionIndex()
    {
        Console::output("Start Set data!");
        $filePath = '1.jpg';
        $visionComponet = \Yii::$app->vision;
        \Yii::warning('File Checking!', 'queue');
        $check = $visionComponet->actionVisionSafe($filePath);

        Console::output("Start Set data done!");
    }

    public function actionCopyM3u8()
    {
        $str = 'ffmpeg -i "http://host/folder/file.m3u8" -bsf:a aac_adtstoasc -vcodec copy -c copy -crf 50 file.mp4';

        Console::output("Run Queue!");
        \Yii::$app->runAction('queue/run', ['interactive' => $this->interactive]);
    }

    public function actionRunQueue()
    {
        Console::output("Run Queue!");
        \Yii::$app->runAction('queue/run', ['interactive' => $this->interactive]);
    }

    //https://docs.peer5.com/guides/production-ready-hls-vod/
    public function actionConvert()
    {
        chdir('storage/web/source/media');
        //exec('mkdir test');
        //Di chuyển file vào thư mục
        //exec('mv 1.mp4 1');
        //exec('youtube-dl https://www.youtube.com/watch?v=stcpEVcHqw8');
        //exec('youtube-dl --output "%(uploader)s%(title)s.%(ext)s" https://www.youtube.com/watch?v=stcpEVcHqw8');
        exec('ffmpeg -i 1.mp4 -g 60 -hls_time 5 -hls_list_size 0 "out.m3u8" "1/out%03d.ts"');
        echo "Done";
    }

    /*
	 * Download Mp3 From Youtube
	 * */
    public function actionMp3($id = null)
    {
        //Goto Youtube Mp3 Folder
        chdir('storage/web/source/yt-mp3');

        $videoUrl = 'https://www.youtube.com/watch?v=' . $id;
        $yID = YoutubeHelper::youtube_id_from_url($videoUrl);
        echo "Start Download";
        //exec( 'youtube-dl  --extract-audio --audio-format mp3  --output "' . $yID . '.%(ext)s" ' . $videoUrl );
        exec('youtube-dl  --extract-audio --audio-format mp3 ' . $videoUrl);
        echo "Done";
    }

    /*
     * Download Video From Youtube
     * */
    public function actionDownloadVideo()
    {

    }

    public function actionYoutube9()
    {
        chdir('storage/web/source/yt-mp3');

        $key = 'AIzaSyAbCn4H2gG4OfkIefnXWaShvS8QcEpkGZY';
        $playlistId = 'PLg0vLHHEmNEKV2JKd2kS4N37ux1p1GNgE';
        $youtube = new Youtube(array('key' => $key));

        $nextToken = '';
        $i = 1;
        do {
            $params = [
                'playlistId' => $playlistId,
                'part'       => 'id, snippet, contentDetails, status',
                'maxResults' => 20,
                //'pageToken' => 'CAwQAA'
            ];
            if ($nextToken && !empty($nextToken)) {
                $params['pageToken'] = $nextToken;
            }
            $video = $youtube->getPlaylistItemsByPlaylistIdAdvanced($params, true);

            $videoData = $video['results'];

            //dd($videoData);

            foreach ($videoData as $key => $videoItem) {
                $dataDetail = $videoItem->snippet;

                //dd($dataDetail);
                $titleV = $dataDetail->title;
                //$titleV = str_replace( " - Tháº§y ThÃ­ch PhÆ°á»›c Tiáº¿n 2017", "", $titleV );

                $titleV = Inflector::transliterate($titleV);
                //dd( $titleV );
                if (!pathExist('yt-mp3/' . $titleV . '.mp3')) {
//$this->runAction( 'mp3', [ 'id' => $dataDetail->resourceId->videoId ] );
                    $videoUrl = 'https://www.youtube.com/watch?v=' . $dataDetail->resourceId->videoId;
                    $yID = YoutubeHelper::youtube_id_from_url($videoUrl);
                    echo "Start Download";
                    exec('youtube-dl  --extract-audio --audio-format mp3 --output "' . $titleV . '.%(ext)s"  ' . $videoUrl);
                    echo "Done";
                } else {
                    echo "File Exits!";
                }


            }

            //return $video;
            //echo $nextToken;
            $nextToken = $video['info']['nextPageToken'];
            //$nextToken = null;

            //echo $nextToken. ' ';

            //dd( 'Done' );
            $i = $i + 1;
        } while ($nextToken != null);

        return 'ok';
        // dd($video);

        // dd($video['info']['nextPageToken']);
    }


}

