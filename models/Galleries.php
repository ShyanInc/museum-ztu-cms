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
}