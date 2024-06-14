<?php

namespace models;

use core\Core;
use core\Model;

/**
 * @property int $id Id
 * @property string $email Email
 * @property string $password Password
 * @property string $name Name
 * @property string $surname Surname
 * @property string $role Role
 */
class Users extends Model
{
    public static $tableName = 'users';

    public static function FindByCredentials($email, $password)
    {
        $rows = self::findByCondition(['email' => $email, 'password' => $password]);
        if (!empty($rows)) {
            return $rows[0];
        } else {
            return null;
        }
    }

    public static function FindByEmail($email)
    {
        $rows = self::findByCondition(['email' => $email]);
        if (!empty($rows)) {
            return $rows[0];
        } else {
            return null;
        }
    }

    public static function IsUserLogged()
    {
        return !empty(Core::getInstance()->session->get('user'));
    }

    public static function LoginUser($user)
    {
        Core::getInstance()->session->set('user', $user);
    }

    public static function LogoutUser()
    {
        Core::getInstance()->session->remove('user');
    }

    public static function RegisterUser($email, $password, $name, $surname)
    {
        $user = new Users();
        $user->email = $email;
        $user->password = $password;
        $user->name = $name;
        $user->surname = $surname;
        $user->role = 'editor';
        $user->save();
    }

    public static function IsUserAdmin()
    {
        return Core::getInstance()->session->get('user')['role'] === 'admin';
    }
}