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
        $candidate = self::findById($id);
        if (!empty($candidate['image'])) {
            $imagePath = Core::getInstance()->rootDirPath . $candidate['image'];
            if (is_file($imagePath)) {
                unlink($imagePath);
            }
        }
        Core::getInstance()->db->delete(static::$tableName, [static::$primaryKey => $id]);
    }

    public static function deleteByCondition($conditionAssocArray)
    {
        Core::getInstance()->db->delete(static::$tableName, $conditionAssocArray);
    }

    public static function findAll(): array|null
    {
        $arr = Core::getInstance()->db->select(static::$tableName, '*');
        if (count($arr) > 0) {
            return $arr;
        } else {
            return null;
        }
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

    public static function updateById($id, $assocArray)
    {
        return Core::getInstance()->db->update(static::$tableName, $assocArray, [static::$primaryKey => $id]);
    }

    public function save()
    {
        $isInsert = false;
        if (!isset($this->{static::$primaryKey})) {
            $isInsert = true;
        } else {
            $value = $this->{static::$primaryKey};
            if (empty($value)) {
                $isInsert = true;
            }
        }

        if ($isInsert) {
            // insert
            Core::getInstance()->db->insert(static::$tableName, $this->fieldsArray);
        } else {
            // update
            Core::getInstance()->db->update(static::$tableName, $this->fieldsArray, [static::$primaryKey => $this->{static::$primaryKey}]);
        }
    }

    public static function uploadImage($image): ?string
    {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        $maxSize = 2 * 1024 * 1024;

        if (!in_array($image['type'], $allowedTypes)) {
            return null;
        }

        if ($image['size'] > $maxSize) {
            return null;
        }

        $tmpName = $image['tmp_name'];
        $fileId = uniqid();
        $extension = pathinfo($image['name'], PATHINFO_EXTENSION);

        $rootPath = Core::getInstance()->rootDirPath;
        $folderPath = "/static/uploads/images/" . static::$tableName . "/";
        if (!file_exists($rootPath . $folderPath)) {
            mkdir($rootPath . $folderPath, 0777, true);
        }

        $newPath = $folderPath . $fileId . '.' . $extension;

        if (move_uploaded_file($tmpName, $rootPath . $newPath)) {
            return $newPath;
        } else {
            return null;
        }
    }
}