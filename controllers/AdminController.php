<?php

namespace controllers;

use core\Controller;
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
        $posts = Posts::findAll();
        return $this->render(null, ['posts' => $posts]);
    }
}