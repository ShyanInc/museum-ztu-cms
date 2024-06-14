<?php

namespace models;

use core\Model;

/**
 * @property int $id ID of galleries
 * @property string $title Title of galleries
 * @property string $description Description of galleries
 * @property string $short_description Short description of galleries
 * @property string $image Path to image of galleries
 */
class Galleries extends Model
{
    public static $tableName = 'galleries';

    public static function update($id, $assocArray, $image = null)
    {
        $candidate = self::findById($id);
        if (!empty($candidate)) {
            if (empty($image['tmp_name'])) {
                $assocArray['image'] = $candidate['image'];
            } else {
                $newPath = self::uploadImage($image);
                $oldPath = __DIR__ . DIRECTORY_SEPARATOR . '..' . $candidate['image'];

                if ($newPath) {
                    if ($candidate['image'] != null && is_file($oldPath)) {
                        unlink($oldPath);
                    }
                    $assocArray['image'] = $newPath;
                } else {
                    throw new \Exception('Failed to upload photo');
                }
            }
            return self::updateById($id, $assocArray);
        }
        return null;
    }
}