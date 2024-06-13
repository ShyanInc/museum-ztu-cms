<?php

namespace controllers;

use core\Controller;
use models\Users;

class UsersController extends Controller
{
    public function actionLogin()
    {
        if ($this->isPost) {
            $user = Users::FindByCredentials($this->post->login, $this->post->password);
            if (!empty($user)) {
                Users::LoginUser($user);
                return $this->redirect('/');
            } else {
                $error_message = 'Неправильний логін та/або пароль.';
                $this->template->setParam('error_message', $error_message);
            }
        }
        return $this->render();
    }

    public function actionLogout()
    {
        Users::LogoutUser();
        return $this->redirect('/users/login');
    }
}