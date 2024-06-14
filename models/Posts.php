<?php

namespace models;

use core\Model;

/**
 * @property int $id ID of posts
 * @property string $title Title of posts
 * @property string $author Author of posts
 * @property string $content Content of posts
 * @property string $created_at Created at timestamp of posts
 * @property string|null $updated_at Updated at timestamp of posts
 */
class Posts extends Model
{
    public static $tableName = 'posts';
}