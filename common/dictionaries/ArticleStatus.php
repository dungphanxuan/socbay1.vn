<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 11/25/2017
 * Time: 10:31 AM
 */

namespace common\dictionaries;

use Yii;

/*
 * Class ArticleStatus
 * Luồng xử lý trạng thái bài viết
 * User => Post new Article, save vào các trạng thái: Draft, Và Active
 * Admin => Kiểm duyệt, ok cho vào trạng thái PUBLISHED, còn không báo không hợp lệ
 * User => Cập nhật, Xóa, phục hồi và Làm mới bài viết
 * */

class ArticleStatus
{
    const DELETED = 0;
    const ACTIVE = 1;
    const PUBLISHED = 1;
    const PENDING = 2;
    const DRAFT = 3;
    const SOLD = 5;

    public static function all()
    {
        return [
            self::DELETED => Yii::t('common', 'Deleted'),
            self::ACTIVE => Yii::t('common', 'Active'),
            self::PENDING => Yii::t('common', 'Pending'),
            self::DRAFT => Yii::t('common', 'Draft'),
            self::SOLD => Yii::t('common', 'Sold'),
        ];
    }

    public static function get($status)
    {
        $all = self::all();

        if (isset($all[$status])) {
            return $all[$status];
        }

        return Yii::t('common', 'Status not set');
    }
}