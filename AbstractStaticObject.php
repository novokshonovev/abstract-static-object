<?php

namespace dowlatow\components;

use yii\base\Object;

abstract class AbstractStaticObject extends Object implements IStaticObject
{
    private static $_all = [];
    /**
     * @return static[]|IStaticObject[]
     */
    public static function getAll()
    {
        if (!isset(self::$_all[get_called_class()])) {
            self::$_all[get_called_class()] = static::fetchAll();
        }
        return self::$_all[get_called_class()];
    }
    /**
     * @param $id
     *
     * @return AbstractStaticObject|static
     */
    public static function find($id)
    {
        foreach (static::getAll() as $type) {
            if ($type->getId() == $id) {
                return $type;
            }
        }
        return null;
    }
    /**
     * @param IStaticObject $object
     *
     * @return bool
     */
    public function equals(IStaticObject $object)
    {
        return $object->getId() == $this->getId();
    }
}