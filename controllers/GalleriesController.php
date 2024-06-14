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

    public function actionEdit(array $params)
    {
        if (!empty($params)) {
            $gallery = Galleries::findById($params[0]);

            $this->template->setParam('gallery', $gallery);

            return $this->render();
        }
        return null;
    }

    public function actionDelete(array $params)
    {
        if (!empty($params)) {
            Galleries::deleteById($params[0]);
        }
        return $this->redirect('/admin/galleries');
    }
}