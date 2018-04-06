<?php

namespace akela\commentator\models\query;
use akela\commentator\models\NewComments;

/**
 * This is the ActiveQuery class for [[\common\models\Comment]].
 *
 * @see \common\models\Comment
 */
class NewCommentsQuery extends \yii\db\ActiveQuery
{

    /**
     * Условие для поиска комментариев определённого пользователя
     * @param string $url по-умолчанию текущая страница
     * @return $this
     */
    public function user($id)
    {
        if ( empty($id) )
            return $this;

        $this->andWhere(['user_id' => $id]);
        return $this;
    }

    /**
     * @inheritdoc
     * @return \common\models\Comment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Comment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}