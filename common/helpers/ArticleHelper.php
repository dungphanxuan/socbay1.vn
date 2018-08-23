<?php

namespace common\helpers;

use common\models\Article;
use common\models\ArticleDetail;
use Yii;

/*
 * Class ArticleHelper
 * Danh sách Function
 * 1. Chi tiết bài viết
 * 2. Số lượng bài viết theo danh mục
 * */

class ArticleHelper
{
    public static function getDetail($id, $update = false)
    {
        $cacheKey = [
            Article::class,
            CACHE_ARTICLE_DETAIL . $id
        ];
        $data = dataCache()->get($cacheKey);

        //$update = true;

        if ($data === false or $update) {
            $data = [];
            /** @var Article $model */
            $model = Article::find()
                ->published()
                ->where(['id' => $id])
                ->one();
            if ($model) {
                $data['id'] = $model->id;
                //$data['aid'] = $model->aid;
                $data['title'] = $model->title;
                $data['body'] = $model->body;
                //Cat data
                $data['category_id'] = $model->category ? $model->category->id : '';
                $data['category_name'] = $model->category ? $model->category->title : '';
                //$data['category_text'] = 'Điện thoại';
                $data['category_text'] = $model->category ? $model->category->title : '';
                $data['thumbnail_image'] = $model->thumbnail_base_url . '/' . $model->thumbnail_path;
                $data['thumb_image'] = $model->getImgThumbnail(2, 75, 137, 81);

                $thumbPath = 'thumb/' . $model->thumbnail_path;

                if (fileStorage()->getFilesystem()->has($thumbPath)) {
                    $data['thumb_image'] = $model->thumbnail_base_url . '/' . $thumbPath;
                }

                //Price
                $data['price'] = $model->price;
                $data['price-show'] = ($model->price ? getCurrencyFormat()->asDecimal($model->price) : '') . '₫';
                $dataImage = [];
                $countImage = 0;
                if ($model->attachments) {

                    foreach ($model->attachments as $itemAtt) {
                        //Check Has File
                        if (fileStorage()->getFilesystem()->has($itemAtt['path'])) {
                            $itemAttacthment = [];
                            $itemAttacthment[] = $itemAtt['base_url'] . '/' . $itemAtt['path'];


                            $urlStandar = ArticleHelper::getImgThumb($itemAtt['base_url'], $itemAtt['path'], 790, 445);

                            $urlThumbnail = ArticleHelper::getImgThumb($itemAtt['base_url'], $itemAtt['path'], 100, 75);

                            $itemAttacthment[] = $urlThumbnail;
                            $itemAttacthment[] = $urlStandar;
                            $dataImage[] = $itemAttacthment;
                            $countImage++;
                        }
                    }
                }
                //Empty Attacthment

                if ($countImage == 0) {
                    $dataImage = [];
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

                //Ads Info
                $data['map_url'] = 'http://maps.google.com/maps?q=21.022736,105.8019441';
                if ($model->latValue) {
                    $data['map_url'] = 'http://maps.google.com/maps?q=' . $model->latValue . ',' . $model->lngValue . '';
                }
                $data['address_text'] = $model->getFullAddress();
                $data['condition_text'] = 'Mới';

                $appFormat = \Yii::$app->formatter;
                //dd($model->attributes);

                //Owner User Info
                $dataSeller = [];
                $modelOwner = $model->author;
                //dd($modelOwner->userProfile);
                if ($modelOwner) {
                    $dataSeller['fullname'] = $modelOwner->userProfile ? $modelOwner->userProfile->getFullName() : '';
                    $dataSeller['address'] = $modelOwner->userProfile ? $modelOwner->userProfile->getFullAddress() : '';
                    $dataSeller['mobile'] = $modelOwner->userProfile->phone ? $modelOwner->userProfile->phone : '';
                    $dataSeller['joined_date'] = $appFormat->asDate($modelOwner->created_at);
                } else {
                    $dataSeller['fullname'] = '';
                    $dataSeller['address'] = '';
                    $dataSeller['mobile'] = '';
                    $dataSeller['joined_date'] = '';

                }

                $data['seller_user'] = $dataSeller;


                //Company data
                $dataCompany = [
                    'id'        => null,
                    'title'     => null,
                    'thumbnail' => null,
                ];
                $dataJob = [
                    'type'          => 0,
                    'category_id'   => 0,
                    'category_slug' => 'khac',
                    'category_name' => 'Khác'
                ];
                /** @var ArticleDetail $modelDetail */
                $modelDetail = $model->detail;
                if ($modelDetail) {
                    if ($modelDetail->company) {
                        $dataCompany['id'] = $modelDetail->company->id;
                        $dataCompany['title'] = $modelDetail->company->title;
                        $dataCompany['address'] = $modelDetail->company->id;
                        $dataCompany['thumbnail'] = $modelDetail->company->getImgThumbnail();
                    }
                    if ($modelDetail->jobCategory) {
                        $dataJob['category_id'] = $modelDetail->jobCategory->id;
                        $dataJob['category_slug'] = $modelDetail->jobCategory->slug;
                        $dataJob['category_name'] = $modelDetail->jobCategory->title;
                    }
                }

                $data['job_company'] = $dataCompany;

                $data['job_data'] = $dataJob;

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


    /*
     * Random Article ID
     * */
    public static function getArticleByFilePath($path)
    {
        $id = null;
        $model = Article::find()->where(['thumbnail_path' => $path])->one();
        if ($model) {
            $id = $model->id;
        }

        return $id;
    }


    /*
     * Article Thumbnail Image
     * */
    public static function getImgSourceType($base_url)
    {
        $needleGoogle = "googleapis";
        if (strpos($base_url, $needleGoogle) !== false) {
            return 1;
        }

        $needleFilestack = "filestackcontent";
        if (strpos($base_url, $needleFilestack) !== false) {
            return 2;
        }

        return 0;
    }


    public static function getImgThumb($base_url, $path, $w = 100, $h = 75)
    {
        $sourceType = ArticleHelper::getImgSourceType($base_url);
        switch ($sourceType) {
            case 0:
                $url = Yii::$app->glide->createSignedUrl(['glide/index',
                                                          'path' => $path,
                                                          'w'    => $w,
                                                          'h'    => $h,
                                                          'fit'  => 'crop']);
                break;
            default:
                $url = FilestackHelper::resizeUrl($base_url . '/' . $path, $w, $h);
        }

        return $url;
    }


}