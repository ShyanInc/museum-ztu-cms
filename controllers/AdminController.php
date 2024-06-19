<?php

namespace controllers;

use core\Controller;
use models\Contacts;
use models\Events;
use models\Galleries;
use models\Messages;
use models\Posts;

class AdminController extends Controller
{
    public function actionGalleries()
    {
        if ($this->user['role'] !== 'admin') {
            return null;
        }

        $galleries = Galleries::findAll();
        return $this->render(null, ['galleries' => $galleries]);
    }

    public function actionEvents()
    {
        if ($this->user['role'] !== 'admin') {
            return null;
        }

        $events = Events::findAll();
        return $this->render(null, ['events' => $events]);
    }

    public function actionPosts()
    {
        if ($this->user['role'] === 'admin') {
            $posts = Posts::findAll();
        } else {
            $posts = Posts::findByAuthorId($this->user['id']);
        }
        return $this->render(null, ['posts' => $posts]);
    }

    public function actionMessages()
    {
        if ($this->user['role'] !== 'admin') {
            return null;
        }

        $messages = Contacts::findAll();
        return $this->render(null, ['messages' => $messages]);
    }
}