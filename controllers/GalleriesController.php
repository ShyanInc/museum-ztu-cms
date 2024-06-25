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

    public function actionView($params)
    {
        if (empty($params)) {
            $this->redirect('/galleries');
            die;
        }
        $id = $params[0];
        $gallery = Galleries::findById($id);
        if (empty($gallery)) {
            $this->redirect('/galleries');
        }
        return $this->render(null, ['gallery' => $gallery]);
    }

    public function actionAdd()
    {
        if ($this->isPost) {
            $galleryData = $this->post->getAll();
            foreach ($galleryData as $key => $value) {
                if (empty($value)) {
                    return null;
                }
            }
            $gallery = new Galleries();
            $gallery->title = $galleryData['title'];
            $gallery->description = $galleryData['description'];
            $gallery->short_description = $galleryData['short_description'];

            $imagePath = null;
            if (!empty($_FILES['image']['tmp_name'])) {
                $imagePath = Galleries::uploadImage($_FILES['image']);
            }
            $gallery->image = $imagePath;
            $gallery->save();
            return $this->redirect('/admin/galleries');
        }

        return $this->render();
    }

    /**
     * @throws \Exception
     */
    public function actionEdit(array $params)
    {
        if (count($params) === 0) {
            return null;
        }

        $id = $params[0];

        if ($this->isPost) {
            $editedGallery = $this->post->getAll();
            foreach ($editedGallery as $key => $value) {
                if (empty($value)) {
                    return null;
                }
            }
            Galleries::updateWithImage($id, $editedGallery, $_FILES['image']);
            $this->redirect('/admin/galleries');
        }

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