<?php

namespace controllers;

use core\Controller;
use models\Posts;

class PostsController extends Controller
{
    public function actionIndex()
    {
        $posts = Posts::findAll();
        return $this->render(null, ['posts' => $posts]);
    }
}