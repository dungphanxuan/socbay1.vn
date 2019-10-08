<?php

namespace common\components;

use yii\apidoc\helpers\ApiMarkdown;
use yii\helpers\HtmlPurifier;
use yii\helpers\Markdown;
use Yii;


class Formatter extends \yii\i18n\Formatter
{
    public $dateFormat = 'medium';
    public $timeFormat = 'medium';
    public $datetimeFormat = 'medium';
    public $timeZone = 'Asia/Ho_Chi_Minh';
    //public $timeZone = 'UTC';

    public $purifierConfig = [
        'HTML' => [
            'AllowedElements' => [
                'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
                'strong', 'em', 'b', 'i', 'u', 's', 'span',
                'pre', 'code',
                'table', 'tr', 'td', 'th',
                'a', 'p', 'br',
                'blockquote',
                'ul', 'ol', 'li',
                'img'
            ],
        ],
        'Attr' => [
            'EnableID' => true,
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        if ($this->booleanFormat === null) {
            $this->booleanFormat = [
                '<i class="fa fa-times" style="color:#c00;"></i> ' . Yii::t('common', 'No', [], $this->locale),
                '<i class="fa fa-check" style="color:green;"></i> ' . Yii::t('common', 'Yes', [], $this->locale)
            ];
        }
        parent::init();
    }

    public function asDatetimerel($value)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        return $this->asDatetime($value) . ' (' . $this->asRelativeTime($value) . ')';
    }

    /**
     * Format as normal markdown without class link extensions.
     *
     * @param $markdown
     * @return string
     */
    public function asMarkdown($markdown)
    {
        Markdown::$flavors['yii-gfm'] = [
            'class' => \common\components\Markdown::class,
            'html5' => true,
        ];
        $html = Markdown::process($markdown, 'yii-gfm');

        $html = $this->replaceHeadlines($html);

        $output = HtmlPurifier::process($html, $this->purifierConfig);

        return '<div class="markdown">' . $output . '</div>';
    }

    /**
     * Format as comment markdown without class link extensions but preserves newlines.
     *
     * @param $markdown
     * @return string
     */
    public function asCommentMarkdown($markdown)
    {
        Markdown::$flavors['yii-gfm-comment'] = [
            'class' => \common\components\Markdown::class,
            'html5' => true,
            'enableNewlines' => true,
        ];
        $html = Markdown::process($markdown, 'yii-gfm-comment');

        $html = $this->replaceCommentHeadlines($html);

        $output = HtmlPurifier::process($html, $this->purifierConfig);

        return '<div class="markdown">' . $output . '</div>';
    }

    /**
     * Format as guide markdown including class links and other special features.
     *
     * Do NOT use this to render Guide markdown files!
     * It will manipulate headline tags!
     * This is only used for other parts of the site that use similar markdown
     * features, e.g. Wiki and Extensions.
     *
     * @param $markdown
     * @return string
     */
    public function asGuideMarkdown($markdown)
    {
        $html = ApiMarkdown::process($markdown);

        $html = $this->replaceHeadlines($html);

        $output = HtmlPurifier::process($html, $this->purifierConfig);

        return '<div class="markdown">' . $output . '</div>';
    }

    /**
     * Replace headlines in markdown to avoid users using H1 and H2 tags.
     * @param string $html
     * @return string
     */
    private function replaceHeadlines($html)
    {
        // replace level of headline tags, h1 -> h3, ...
        return preg_replace_callback('~(</?h)(\d)( |>)~i', function ($matches) {
            $level = $matches[2] + 2;
            if ($level > 6) {
                $level = 6;
            }

            return $matches[1] . $level . $matches[3];
        }, $html);
    }

    /**
     * @param string $html
     * @return string
     */
    private function replaceCommentHeadlines($html)
    {
        return preg_replace('/<h\d+.*?>(.*?)<\\/h\d+>/i', "<p><strong>\\1</strong></p>", $html);
    }
}
