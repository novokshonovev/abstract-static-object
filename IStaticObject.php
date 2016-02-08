<?php
namespace dowlatow\components;

interface IStaticObject
{
    /**
     * @param $id
     *
     * @return IStaticObject|static
     */
    public static function find($id);
    /**
     * @return IStaticObject[]|static[]
     */
    public static function getAll();
    /**
     * @return mixed
     */
    public function getId();
    public static function fetchAll();
    /**
     * @param IStaticObject $object
     *
     * @return bool
     */
    public function equals(IStaticObject $object);
}




