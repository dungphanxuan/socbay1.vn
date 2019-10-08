<?php

namespace common\components\object;

use app\models\Comment;
use app\models\Extension;
use app\models\File;
use app\models\News;
use app\models\Wiki;
use common\models\Article;
use yii\base\InvalidValueException;

class ClassType
{
    const ARTICLES = 'article';
    const NEWS = 'news';
    const WIKI = 'wiki';
    const EXTENSION = 'extension';
    const COMMENT = 'comment';
    const FILE = 'file';

    const GUIDE = 'guide';
    const API = 'api';

    public static $classes = [
        self::ARTICLES => Article::class,
        self::NEWS => News::class,
        self::WIKI => Wiki::class,
        self::EXTENSION => Extension::class,
        self::COMMENT => Comment::class,
        self::FILE => File::class,
    ];

    /**
     * @param string $type
     *
     * @return string
     */
    public static function getClass($type)
    {
        if (array_key_exists($type, static::$classes)) {
            return static::$classes[$type];
        }

        throw new InvalidValueException("Object type \"{$type}\" was not found.");
    }
}
