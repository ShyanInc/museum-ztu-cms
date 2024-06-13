<?php

namespace models;

use core\Model;

/**
 * @property int $id ID of news
 * @property string $title Title of news
 * @property string $text Text of news
 * @property string $short_text Short text of news
 * @property string $date Date of news
 */
class News extends Model
{
    public static $tableName = 'news';
}
