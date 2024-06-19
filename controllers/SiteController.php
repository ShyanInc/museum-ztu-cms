<?php

namespace controllers;

use core\Controller;
use models\Posts;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $posts = Posts::findLatestWithLimit(3);
        return $this->render(null, ['posts' => $posts]);
    }
}
