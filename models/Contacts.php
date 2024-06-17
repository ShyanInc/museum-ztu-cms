<?php

namespace models;

use core\Model;

/**
 * @property int $id ID of contacts
 * @property string $name Name of sender
 * @property string $email Email of sender
 * @property string $message Message of contacts
 */
class Contacts extends Model
{
    public static $tableName = 'contacts';
}