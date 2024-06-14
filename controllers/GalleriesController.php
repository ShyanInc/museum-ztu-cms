<?php

namespace controllers;

use core\Controller;
use models\Galleries;

class GalleriesController extends Controller
{
    public function actionIndex(): array
    {
        $galleries = Galleries::findAll();
        return $this->render(null, ['galleries' => $galleries]);
    }
}