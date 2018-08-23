<?php

namespace common\helpers;

use common\models\golf\Media;
use common\models\golf\MediaChannel;
use common\models\golf\PlaylistDetail;
use Yii;
use yii\helpers\ArrayHelper;

/*
 * Class ContentHelper
 * */

class ContentHelper
{
    public static function getDetail($id, $update = false)
    {
        $cacheKey = CACHE_ARTICLE_ITEM . $id;
        $data = dataCache()->get($cacheKey);

        if ($data === false or $update) {
            $data = [];
            /*Set cache*/
            dataCache()->set($cacheKey, $data, TimeHelper::SECONDS_IN_AN_HOUR);
        }

        return $data;
    }

    /*
     * Video New Data
     * Type: 1 Most watched
     * Type: 2 Quick & Tip
     * Type: 3 Filter by category
     * */
    public static function getNewData($id = 0, $limit = 8, $type = 0, $video_id = 0, $offset = 0, $update = false)
    {
        $cacheKey = CACHE_NEW_DATA . $id;
        $cacheKey = $cacheKey . $type;
        $cacheKey = $cacheKey . $offset;

        $data = dataCache()->get($cacheKey);

        //$update = env('IS_CACHE') ? true : false;

        // $update = true;
        if ($data === false or $update) {
            $data = [];
            $models = Media::find()->published()
                //->orderBy('updated_at DESC');
                //->orderBy('id DESC')
                ->orderBy(['sort_number' => SORT_ASC, 'id' => SORT_DESC]);

            //Filter by category
            if ($id > 0) {
                if ($video_id == 1) {
                    $models->andWhere(['channel_id' => $id]);
                } else {
                    $models->andWhere(['category_id' => $id]);
                }
            }

            switch ($type) {
                case 0:
                    //$models->orderBy(new Expression('rand()'));
                    $models->orderBy(['id' => SORT_DESC]);
                    break;
                case 1:
                    //$models->orderBy(new Expression('rand()'));
                    $models->orderBy(['view_count' => SORT_DESC]);
                    break;
                case 2:
                    $dataIDQuickTip = PlaylistDetail::find()->select('video_id')->where(['playlist_id' => 1])->asArray()->all();
                    $idsVideo = ArrayHelper::getColumn($dataIDQuickTip, function ($user) {
                        return $user['video_id'];
                    });

                    $models->andWhere(['in', 'id', $idsVideo]);
                    break;
                case 3:
                    break;
                case 4:
                    break;
                case 5:
                    break;
                case 9:
                    break;
                case 8:
                    break;
            }
            //Video ID
            if ($video_id) {
                $models->andWhere(['not in', 'id', [$video_id]]);
            }

            $models->limit($limit);
            $models->offset($offset);
            $models->with('mediaAttachments', 'category');

            //var_dump($models->prepare(Yii::$app->db->queryBuilder)->createCommand()->rawSql);
            //die;
            //$modelQuery = $models->prepare( Yii::$app->db->queryBuilder )->createCommand()->rawSql;
            //$medias     = Yii::$app->db->createCommand( $modelQuery )->queryAll();

            //dd($medias);

            //$dataVideo = $models->all();
            //Using Plain Arrays
            $dataVideo = $models->asArray()->all();

            //Raw data
            if ($dataVideo) {
                /**
                 * @var $item Media
                 */
                foreach ($dataVideo as $item) {
                    $dataMedia = MediaHelper::getDetail($item['id']);
                    $dataMediaMin = MediaHelper::getShortDetail($item['id']);
                    $vi = [];
                    $vi['id'] = $item['id'];
                    $vi['title'] = $item['title'];
                    $vi['slug'] = $item['slug'];
                    $vi['show_url'] = frontendUrl()->createAbsoluteUrl(['/media/view', 'slug' => $item['slug']]);;
                    $vi['url'] = $item['video_url'];
                    $vi['poster'] = $dataMediaMin['poster_image'];
                    $vi['poster_mobile'] = $dataMediaMin['poster_image_mobile'];
                    $vi['poster_mobile_tablet'] = $dataMediaMin['poster_image_tablet'];
                    $vi['view_count'] = $item['view_count'];
                    $vi['statistics'] = $dataMedia['statistics'];

                    $vi['date'] = $item['updated_at'] ? DateHelper::getShowDate($item['updated_at']) : '';

                    $data[] = $vi;
                }
            }
            /*Set cache*/
            dataCache()->set($cacheKey, $data, TimeHelper::SECONDS_IN_AN_HOUR);
        }

        return $data;
    }

    /*
     * Raw data
     * */
    public static function getChannel($update = false)
    {
        $cKey = 'dr';
        $data = dataCache()->get($cKey);

        //$update = true;

        if ($data === false or $update) {
            // $data is not found in cache, calculate it from scratch
            $data = [];
            $modelData = MediaChannel::find()->orderBy(['order' => SORT_ASC])->limit(4)->all();
            /** @var MediaChannel $model */
            foreach ($modelData as $model) {
                $item = [];
                $item['id'] = $model->id;
                $item['title'] = $model->title;
                $item['slug'] = $model->slug;
                //$item['thumbnail'] = $model->image_base_url . '/' . $model->image_path;
                $item['thumbnail'] = Yii::$app->glide->createSignedUrl([
                    'glide/index',
                    'path' => $model->image_path,
                    'q'    => 75
                ]);

                if (env('IS_HTTPS')) {
                    $item['thumbnail'] = preg_replace("/^http:/i", "https:", $item['thumbnail']);
                }

                $data[] = $item;
            }

            // store $data in cache so that it can be retrieved next time
            dataCache()->set($cKey, $data);
        }

        return $data;
    }

    /*
     * Raw data
     * */
    public static function rawData($item)
    {

    }

}