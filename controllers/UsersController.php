<?php

namespace controllers;

use core\Controller;
use models\Users;

class UsersController extends Controller
{
    public function actionLogin()
    {
        if (Users::IsUserLogged()) {
            return $this->redirect('/');
        }

        if ($this->isPost) {
            $user = Users::FindByCredentials($this->post->email, $this->post->password);
            if (!empty($user)) {
                Users::LoginUser($user);
                return $this->redirect('/');
            } else {
                $error_message = 'Неправильний логін та/або пароль.';
                $this->addErrorMessage($error_message);
            }
        }
        return $this->render();
    }

    public function actionRegister()
    {
        if ($this->isPost) {
            $user = Users::FindByEmail($this->post->email);

            if (!empty($user)) {
                $this->addErrorMessage('Користувач з такою ел.поштою вже існує');
            }

            if (strlen($this->post->email) === 0) {
                $this->addErrorMessage('Ел.пошту не вказано');
            }

            if (strlen($this->post->password) === 0) {
                $this->addErrorMessage('Пароль не вказано');
            }

            if (strlen($this->post->repeat_password) === 0) {
                $this->addErrorMessage('Повторення паролю не вказано');
            }

            if ($this->post->password !== $this->post->repeat_password) {
                $this->addErrorMessage('Паролі не співпадають');
            }

            if (strlen($this->post->name) === 0) {
                $this->addErrorMessage('Ім\'я не вказано');
            }

            if (strlen($this->post->surname) === 0) {
                $this->addErrorMessage('Прізвище не вказано');
            }

            if (!$this->isErrorMessagesExists()) {
                Users::RegisterUser($this->post->email, $this->post->password, $this->post->name, $this->post->surname);
                return $this->redirect('/users/registersuccess');
            }
        }
        return $this->render();
    }

    public function actionRegistersuccess()
    {
        return $this->render();
    }

    public function actionLogout()
    {
        Users::LogoutUser();
        return $this->redirect('/users/login');
    }
}