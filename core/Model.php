<?php

namespace core;

class Model
{
    protected static $primaryKey = 'id';
    protected static $tableName = '';

    protected $fieldsArray;

    public function __construct()
    {
        $this->fieldsArray = [];
    }

    public function __set($name, $value)
    {
        $this->fieldsArray[$name] = $value;
    }

    public function __get($name)
    {
        return $this->fieldsArray[$name];
    }

    public static function deleteById($id)
    {
        Core::getInstance()->db->delete(static::$tableName, [static::$primaryKey => $id]);
    }

    public static function deleteByCondition($conditionAssocArray)
    {
        Core::getInstance()->db->delete(static::$tableName, $conditionAssocArray);
    }

    public static function findById($id)
    {
        $arr = Core::getInstance()->db->select(static::$tableName, '*', [static::$primaryKey => $id]);
        if (count($arr) > 0) {
            return $arr[0];
        } else {
            return null;
        }
    }

    public static function findByCondition($conditionAssocArray)
    {
        $arr = Core::getInstance()->db->select(static::$tableName, '*', $conditionAssocArray);
        if (count($arr) > 0) {
            return $arr;
        } else {
            return null;
        }
    }

    public function save()
    {
        $id = $this->{static::$primaryKey};
        if (empty($id)) {
            // insert
            Core::getInstance()->db->insert(static::$tableName, $this->fieldsArray);
        } else {
            //update
            Core::getInstance()->db->update(static::$tableName, $this->fieldsArray, [static::$primaryKey => $this->{static::$primaryKey}]);
        }
    }
}