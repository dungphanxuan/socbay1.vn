<?php

namespace common\helpers;


use common\models\golf\Media;
use Yii;

/**
 * Collection of useful helper functions for Yii Applications
 *
 * @author dungphanxuan <dungphanxuan999@gmail.com>
 * @since  1.0
 *
 */
class MediaHelper
{
    /*
     * Get Media detail
     * */
    public static function getDetail($id, $update = false)
    {
        $cacheKey = CACHE_MEDIA_ITEM . $id;
        $data = dataCache()->get($cacheKey);

        $update = env('IS_CACHE') ? true : false;

        if ($data === false or $update) {
            $data = [];
            /** @var Media $model */
            $model = Media::find()->published()->where(['id' => $id])->one();
            if ($model) {
                $data['id'] = $model->id;
                $data['title'] = $model->title;
                $data['slug'] = $model->slug;
                $data['description'] = $model->description;
                $data['category_id'] = isset($model->category) ? $model->category->id : '';
                $data['category_name'] = isset($model->category) ? $model->category->title : '';
                $data['poster_image'] = $model->poster_base_url . '/' . $model->poster_path;

                //Set youtube thumbnail as poster
                if (empty($model->poster_path)) {
                    if ($model->video_play_type == 2) {
                        $youtubePoster = 'https://img.youtube.com/vi/' . YoutubeHelper::youtube_id_from_url($model->video_url) . '/maxresdefault.jpg';
                        /* if (!FileHelper::url_exists($youtubePoster)) {
                             $youtubePoster = 'https://img.youtube.com/vi/' . YoutubeHelper::youtube_id_from_url($model->video_url) . '/hqdefault.jpg';
                             //dd('FFF');
                         }*/
                        $data['poster_image'] = $youtubePoster;
                    }
                }

                $data['video_source'] = $model->video_base_url . '/' . $model->video_path;

                $data['video_play_type'] = $model->video_play_type;
                $data['video_url'] = $model->video_url;
                $data['youtube_id'] = YoutubeHelper::youtube_id_from_url($model->video_url);
                $data['youtube_embed_url'] = YoutubeHelper::getEmbedUrl($model->video_url);
                $data['youtube_thumbnail_image1'] = 'https://img.youtube.com/vi/' . $model->video_url . '/default.jpg';
                $data['youtube_thumbnail_image2'] = 'https://img.youtube.com/vi/' . $model->video_url . '/maxresdefault.jpg';

                //Chart Info
                $dataStatistics = [
                    'viewCount' => getShowFormat('.')->asInteger($model->view_count),
                    'likeCount' => 1000,
                    'dislikeCount' => 10,
                    'favoriteCount' => 100,
                    'commentCount' => 52
                ];

                $data['statistics'] = $dataStatistics;
                $data['frontend_url'] = frontendUrl()->createAbsoluteUrl(['/media/view']);
                //Meta data
                $data['status'] = $model->status;

                $appFormat = \Yii::$app->formatter;

                $data['date'] = $model->created_at ? DateHelper::getShowDate($model->created_at) : '';
                $data['update_time'] = $model->updated_at ? $appFormat->asDate($model->updated_at) : '';
                $data['create_time'] = $model->updated_at ? $appFormat->asDate($model->created_at) : '';
                $data['updated'] = $model->updated_at ? $model->updated_at : '';

            }

            /*Set cache*/
            dataCache()->set($cacheKey, $data, TimeHelper::SECONDS_IN_AN_HOUR);
        }

        return $data;
    }

    /*
     * Raw Content for show data
     * */
    public static function getRawDetail($id)
    {
        $item = Media::find()->where(['id' => $id])->one();
        $dataMedia = MediaHelper::getDetail($id);
        $dataMediaMin = MediaHelper::getShortDetail($id);
        $vi = [];
        $vi['id'] = $item->id;
        $vi['title'] = $item->title;
        $vi['slug'] = $item->slug;
        $vi['show_url'] = frontendUrl()->createAbsoluteUrl(['/media/view', 'slug' => $item->slug]);;
        $vi['url'] = $item->video_url;
        $vi['poster'] = $dataMediaMin['poster_image'];
        $vi['view_count'] = $item->view_count;
        $vi['statistics'] = $dataMedia['statistics'];

        $vi['date'] = $item->updated_at ? DateHelper::getShowDate($item->updated_at) : '';

        return $vi;
    }

    /*
      * Get Media Image Detail
      * */
    public static function getShortDetail($id, $update = false)
    {
        $cacheKey = CACHE_MEDIA_SHORT_ITEM . $id;
        $data = dataCache()->get($cacheKey);

        //$update = env('IS_CACHE') ? true : false;

        if ($data === false or $update) {
            $data = [];
            /** @var Media $model */
            $model = Media::find()->published()->where(['id' => $id])->one();
            if ($model) {
                $data['id'] = $model->id;
                $data['title'] = $model->title;
                $data['slug'] = $model->slug;
                //$data['poster_image'] = $model->poster_base_url . '/' . $model->poster_path;
                /*$data['poster_image'] = storageUrl()->createAbsoluteUrl( [
                    'glide/index',
                    'path' => $model->poster_path,
                    'q'    => 75
                ] );*/

                $data['poster_image'] = Yii::$app->glide->createSignedUrl([
                    'glide/index',
                    'path' => $model->poster_path,
                    'q' => 75
                ]);

                $data['poster_image_mobile'] = Yii::$app->glide->createSignedUrl([
                    'glide/index',
                    'path' => $model->poster_path,
                    'w' => 480,
                    'q' => 75,
                    'fit' => 'crop'
                ]);

                $data['poster_image_tablet'] = Yii::$app->glide->createSignedUrl([
                    'glide/index',
                    'path' => $model->poster_path,
                    'w' => 767,
                    'q' => 75,
                    'fit' => 'crop'
                ]);

                //Set youtube thumbnail as poster
                if (empty($model->poster_path)) {
                    if ($model->video_play_type == 2) {

                        $youtubeID = YoutubeHelper::youtube_id_from_url($model->video_url);
                        $youtubePoster = '';
                        //Todo download Youtube Image to Storage
                        if (!pathExist('yt/' . $youtubeID . '.jpg')) {
                            $youtubePoster = 'https://img.youtube.com/vi/' . $youtubeID . '/maxresdefault.jpg';
                            if (!FileHelper::url_exists($youtubePoster)) {
                                $youtubePoster = 'https://img.youtube.com/vi/' . $youtubeID . '/hqdefault.jpg';
                                //dd('FFF');
                            }

                            $arrContextOptions = array(
                                "ssl" => array(
                                    "verify_peer" => false,
                                    "verify_peer_name" => false,
                                ),
                            );
                            $image_Data = file_get_contents($youtubePoster, false, stream_context_create($arrContextOptions));
                            file_put_contents(Yii::getAlias('@storage') . "/web/source/yt/" . $youtubeID . '.jpg', $image_Data);
                        }
                        $youtubePoster = Yii::getAlias('@storageUrl') . "/web/source/yt/" . $youtubeID . '.jpg';

                        $data['poster_image'] = $youtubePoster;
                    }
                }

                if (env('IS_HTTPS')) {
                    $data['poster_image'] = preg_replace("/^http:/i", "https:", $data['poster_image']);
                }

                //dd($data);
            }

            /*Set cache*/
            dataCache()->set($cacheKey, $data, TimeHelper::SECONDS_IN_A_DAY);
        }

        return $data;
    }

    /*
   * Random Article ID
   * */
    public static function getRandomID()
    {
        $mediaId = Yii::$app->getSecurity()->generateRandomString(8);
        $model = Media::findOne(['code' => $mediaId,]);
        if (!$model) {
            return $mediaId;
        }

        return MediaHelper::getRandomID();
    }

}