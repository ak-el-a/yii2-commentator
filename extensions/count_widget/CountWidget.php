<?php
namespace akela\commentator\extensions\count_widget;
use akela\commentator\helpers\CHelper as CHelper;
use yii\base\Widget;
use yii\helpers\Html;

class CountWidget extends Widget
{
    /**
     * @var bool использовать ссылку
     */
    public $withLink = true;

    /**
     * Запуск видежта
     */
    public function run()
    {
        return $this->render('count', array(
            'count' => CHelper::getNewCommentsCount(),
            'url' => CHelper::getNewCommentsUrl(),
        ));
    }
}