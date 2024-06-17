<?php

namespace controllers;

use core\Controller;
use core\Core;
use models\Events;
use models\Galleries;
use models\Posts;

class AdminController extends Controller
{
    public function actionGalleries()
    {
        $galleries = Galleries::findAll();
        return $this->render(null, ['galleries' => $galleries]);
    }

    public function actionEvents()
    {
        $events = Events::findAll();
        return $this->render(null, ['events' => $events]);
    }

    public function actionPosts()
    {
        $user = Core::getInstance()->session->get('user');
        if ($user['role'] === 'admin') {
            $posts = Posts::findAll();
        } else {
            $posts = Posts::findByAuthorId($user['id']);
        }
        return $this->render(null, ['posts' => $posts]);
    }
}