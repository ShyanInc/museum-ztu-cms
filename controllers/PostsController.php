<?php

namespace controllers;

use core\Controller;
use core\Core;
use models\Posts;

class PostsController extends Controller
{
    public function actionIndex()
    {
        $posts = Posts::findAll();
        return $this->render(null, ['posts' => $posts]);
    }

    public function actionAdd()
    {
        if ($this->isPost) {
            $postData = $this->post->getAll();
            foreach ($postData as $key => $value) {
                if (empty($value)) {
                    return null;
                }
            }
            $post = new Posts();
            $post->title = $postData['title'];
            $post->content = $postData['content'];

            $user = Core::getInstance()->session->get('user');
            if (!empty($user)) {
                $post->author_id = $user['id'];
                $post->save();
                return $this->redirect('/admin/posts');
            } else {
                return null;
            }
        }

        return $this->render();
    }

    public function actionEdit(array $params)
    {
        if (count($params) === 0) {
            return null;
        }

        $id = $params[0];

        if ($this->isPost) {
            $user = Core::getInstance()->session->get('user');
            if (empty($user)) {
                return null;
            }

            $post = Posts::findById($id);

            if ($user['id'] === $post['author_id'] || $user['role'] === 'admin') {
                $editedPost = $this->post->getAll();
                foreach ($editedPost as $key => $value) {
                    if (empty($value)) {
                        return null;
                    }
                }
                Posts::updateById($id, $editedPost);
                $this->redirect('/admin/posts');
                die;
            }
            return null;
        }

        if (!empty($params)) {
            $post = Posts::findById($params[0]);

            $this->template->setParam('post', $post);

            return $this->render();
        }
        return null;
    }

    public function actionDelete(array $params)
    {
        if (!empty($params)) {
            $id = $params[0];
            $user = Core::getInstance()->session->get('user');
            $post = Posts::findById($id);
            if ($user['id'] === $post['author_id'] || $user['role'] === 'admin') {
                Posts::deleteById($id);
                $this->redirect('/admin/posts');
                die;
            }
        }
        return null;
    }
}