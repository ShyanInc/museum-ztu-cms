<?php

namespace controllers;

use core\Controller;

class NewsController extends Controller
{
    public function actionAdd()
    {
        return $this->render();
    }

    public function actionIndex()
    {
        return $this->render('views/news/view.php');
    }

    public function actionView()
    {
        return $this->render();
    }
}
