<?php

namespace common\helpers;


use common\models\property\Project;
use yii\helpers\Inflector;

/**
 * Collection of useful helper functions for Yii Applications
 *
 * @author dungphanxuan <dungphanxuan999@gmail.com>
 * @since  1.0
 *
 */
class PropertyHelper
{

    /*Get File name without extendsion*/
    public static function getProjectDetail($id, $update = false)
    {
        $cacheKey = [
            Project::class,
            CACHE_PROJECT_DETAIL . $id
        ];
        $data = dataCache()->get($cacheKey);

        //$update = true;

        if ($data === false or $update) {
            $data = [];
            /** @var Project $model */
            $model = Project::find()
                //->published()
                ->where(['id' => $id])
                ->one();
            if ($model) {
                $data['id'] = $model->id;
                //$data['aid'] = $model->aid;
                $data['title'] = $model->title;
                $data['body'] = $model->body;
                //Cat data
                $data['thumbnail_image'] = $model->thumbnail_base_url . '/' . $model->thumbnail_path;
                $data['thumb_image'] = $model->getImgThumbnail(2, 75, 137, 81);

                $thumbPath = 'thumb/' . $model->thumbnail_path;

                if (fileStorage()->getFilesystem()->has($thumbPath)) {
                    $data['thumb_image'] = $model->thumbnail_base_url . '/' . $thumbPath;
                }

                //Location
                $data['city_name'] = $model->city ? $model->city->name : 'Hà Nội';
                $data['district_name'] = $model->district ? $model->district->name : '';
                $data['ward_name'] = $model->ward ? $model->ward->name : '';

                $dataImage = [];
                $countImage = 0;
                if ($model->attachments) {
                    foreach ($model->attachments as $itemAtt) {
                        //Check Has File

                        if (fileStorage()->getFilesystem()->has($itemAtt['path'])) {
                            $itemAttacthment = [];
                            $itemAttacthment[0] = $itemAtt['base_url'] . '/' . $itemAtt['path'];

                            $urlStandar = ArticleHelper::getImgThumb($itemAtt['base_url'], $itemAtt['path'], false, 500);

                            $urlThumbnail = ArticleHelper::getImgThumb($itemAtt['base_url'], $itemAtt['path'], 100, 75);
                            $urlSmall = ArticleHelper::getImgThumb($itemAtt['base_url'], $itemAtt['path'], 100, 80);

                            $itemAttacthment[1] = $urlThumbnail;
                            $itemAttacthment[2] = $urlStandar;
                            $itemAttacthment[3] = $urlSmall;
                            $dataImage[] = $itemAttacthment;
                            $countImage++;
                        }
                    }
                }

                //Empty Attacthment
                if ($countImage == 0) {

                    //Set thumbnail Slide image
                    if ($model->thumbnail_path) {
                        $urlStandar = ArticleHelper::getImgThumb($model->thumbnail_base_url, $model->thumbnail_path, 790, 445);

                        $urlThumbnail = ArticleHelper::getImgThumb($model->thumbnail_base_url, $model->thumbnail_path, 100, 75);

                        $dataImage[] = [
                            $model->thumbnail_base_url . '/' . $model->thumbnail_path,
                            $urlThumbnail,
                            $urlStandar
                        ];
                        $countImage++;
                    }
                }
                $data['attachments'] = $dataImage;
                $data['total_image'] = $countImage;

                $appFormat = \Yii::$app->formatter;
                //dd($model->attributes);

                $data['published_at'] = $model->published_at ? $appFormat->asDatetime($model->published_at) : '';
                $data['update_time'] = $model->updated_at ? $appFormat->asDatetime($model->updated_at) : '';
                $data['updated'] = $model->updated_at ? $model->updated_at : '';
                $data['updated_text'] = $model->updated_at ? $appFormat->asTime($model->updated_at, 'short') : '';
                $data['updated_full'] = $model->updated_at ? $appFormat->asDatetime($model->updated_at, 'medium') : '';

            }

            /*Set cache*/
            dataCache()->set($cacheKey, $data, TimeHelper::SECONDS_IN_AN_HOUR);
        }

        return $data;
    }

}