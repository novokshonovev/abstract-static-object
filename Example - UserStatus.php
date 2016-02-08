<?php

namespace common\models;


use dowlatow\components\AbstractStaticObject;
use Yii;

class UserStatus extends AbstractStaticObject
{
    const MODERATION = 1;
    const REGISTERED = 2;
    const REJECTED   = 3;

    /** @var  int */
    private $_id;
    /** @var  string */
    private $_name;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    public function __construct($id, $name, $config = [])
    {
        parent::__construct($config);
        $this->_id   = $id;
        $this->_name = $name;
    }

    public static function fetchAll()
    {
        return [
            Yii::createObject(['class' => static::className(),], [
                static::MODERATION,
                Yii::t('user', 'In moderation'),
            ]),
            Yii::createObject(['class' => static::className(),], [
                static::REGISTERED,
                Yii::t('user', 'Registered'),
            ]),
            Yii::createObject(['class' => static::className(),], [
                static::REJECTED,
                Yii::t('user', 'Rejected'),
            ]),
        ];
    }

}