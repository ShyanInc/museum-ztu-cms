<?php

namespace controllers;

use core\Controller;
use models\Contacts;

class ContactController extends Controller
{
    public function actionIndex()
    {
        if ($this->isPost) {
            $contactData = $this->post->getAll();
            foreach ($contactData as $key => $value) {
                if (empty($value)) {
                    return null;
                }
            }

            $contact = new Contacts();
            $contact->name = $contactData['name'];
            $contact->email = $contactData['email'];
            $contact->message = $contactData['message'];
            $contact->save();
            return $this->redirect('/contact/success');
        }

        return $this->render();
    }

    public function actionSuccess()
    {
        return $this->render();
    }

    public function actionDelete($params)
    {
        if ($this->user['role'] !== 'admin' || empty($params)) {
            $this->redirect('/');
            die;
        }

        $id = $params[0];
        Contacts::deleteById($id);
        $this->redirect('/admin/messages');
        die;
    }
}