<?php

namespace controllers;

use core\Controller;

class AboutController extends Controller
{
    public function actionIndex(): array
    {
        return $this->render();
    }
}