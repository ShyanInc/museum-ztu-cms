<?php

namespace models;

use core\Core;
use core\Model;

/**
 * @property int $id ID of posts
 * @property string $title Title of posts
 * @property string $content Content of posts
 * @property string $author_id Author ID of posts
 * @property string $created_at Created at timestamp of posts
 * @property string|null $updated_at Updated at timestamp of posts
 */
class Posts extends Model
{
    public static $tableName = 'posts';

    public static function findAll(): ?array
    {
        $sql = 'SELECT posts.*, users.name AS author_name, users.surname AS author_surname FROM `' . self::$tableName . '` posts JOIN `users` ON users.id = posts.author_id ORDER BY posts.created_at DESC';
        return Core::getInstance()->db->pdo->query($sql)->fetchAll();
    }

    public static function findById($id): ?array
    {
        $sql = 'SELECT posts.*, users.name AS author_name, users.surname AS author_surname FROM `' . self::$tableName . '` posts JOIN `users` ON users.id = posts.author_id WHERE posts.id = ' . $id;
        return Core::getInstance()->db->pdo->query($sql)->fetch();
    }

    public static function findByAuthorId(int $authorId): ?array
    {
        $sql = 'SELECT posts.*, users.name AS author_name, users.surname AS author_surname FROM `' . self::$tableName . '` posts JOIN `users` ON users.id = posts.author_id WHERE posts.author_id = ' . $authorId;
        return Core::getInstance()->db->pdo->query($sql)->fetchAll();
    }

    public static function findLatestWithLimit(int $limit): ?array
    {
        $sql = 'SELECT posts.*, users.name AS author_name, users.surname AS author_surname FROM `' . self::$tableName . '` posts JOIN `users` ON users.id = posts.author_id ORDER BY posts.created_at DESC LIMIT ' . $limit;
        return Core::getInstance()->db->pdo->query($sql)->fetchAll();
    }
}