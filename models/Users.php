<?php

namespace models;

use core\Core;
use core\Model;

/**
 * @property int $id Id
 * @property string $login Login
 * @property string $password Password
 * @property string $firstname Name
 * @property string $lastname Surname
 */
class Users extends Model
{
    public static $tableName = 'users';

    public static function FindByCredentials($login, $password)
    {
        $rows = self::findByCondition(['login' => $login, 'password' => $password]);
        if (!empty($rows)) {
            return $rows[0];
        } else {
            return null;
        }
    }

    public static function FindByEmail($login)
    {
        $rows = self::findByCondition(['login' => $login]);
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

    public static function RegisterUser($login, $password, $firstname, $lastname)
    {
        $user = new Users();
        $user->login = $login;
        $user->password = $password;
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->save();
    }
}