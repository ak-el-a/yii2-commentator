<?php
namespace akela\commentator\helpers;
use akela\yii2_commentator\models\NewComments as NewComments;
use akela\yii2_commentator\models\Comment as Comment;
use Yii;

class CHelper
{
    /**
     * @return string ip-адрес
     */
    public static function getRealIP()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        elseif ( !empty($_SERVER['HTTP_X_FORWARDED_FOR']) )
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else
            $ip = $_SERVER['REMOTE_ADDR'];

        return $ip;
    }

    /**
     * @return string формат даты, заданный в модуле
     */
    private static function getDateFormat()
    {
        return Yii::$app->getModule('comments')->dateFormat;
    }

    /**
     * Дата в формате модуля по unix timestamp
     * @param $timestamp int unix timestamp
     * @return string дата в формате, заданном в модуле
     */
    public static function date($timestamp)
    {
        return date(self::getDateFormat(), $timestamp);
    }

    /**
     * Обрезает строку до определённого количества символов, не разбивая слова
     * @param string $str строка
     * @param int $length длина, до скольки символов обрезать
     * @param string $postfix постфикс, который добавляется к строке
     * @return string обрезанная строка
     */
    public static function cutStr($str, $length=50, $postfix='...')
    {
        if ( strlen($str) < $length)
            return $str;

        $temp = substr($str, 0, $length);
        return substr($temp, 0, strrpos($temp, ' ') ) . $postfix;
    }

    /**
     * @return int количество новых комментариев
     */
    public static function getNewCommentsCount()
    {
        $userID = \Yii::$app->getModule('comments')->getUserID();
        return !empty($userID) ? NewComments::find()->user($userID)->count() : 0;
    }

    /**
     * @return string урл первого нового комментария
     */
    public static function getNewCommentsUrl()
    {
        $userID = \Yii::$app->getModule('comments')->getUserID();

        if ( !empty($userID) )
        $newComments = NewComments::find()->user($userID)->all();

        if ( empty($newComments) )
            return false;

        $comment = Comment::find()->where(['id'=>$newComments[0]->comment_id])->one();
        return $comment->url . '#comment_' . $comment->id;
    }
}