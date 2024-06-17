<?php

namespace controllers;

use core\Controller;
use models\Events;

class EventsController extends Controller
{
    public function actionIndex()
    {
        $events = Events::findAll();
        return $this->render(null, ['events' => $events]);
    }

    public function actionAdd()
    {
        if ($this->isPost) {
            $eventData = $this->post->getAll();
            foreach ($eventData as $key => $value) {
                if (empty($value)) {
                    return null;
                }
            }
            $event = new Events();
            $event->title = $eventData['title'];
            $event->description = $eventData['description'];
            $event->start_date = $eventData['start_date'];
            $event->end_date = $eventData['end_date'];

            $imagePath = null;
            if (!empty($_FILES['image']['tmp_name'])) {
                $imagePath = Events::uploadImage($_FILES['image']);
            }
            $event->image = $imagePath;
            $event->save();
            return $this->redirect('/admin/events');
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
            $editedEvent = $this->post->getAll();
            foreach ($editedEvent as $key => $value) {
                if (empty($value)) {
                    return null;
                }
            }
            Events::updateWithImage($id, $editedEvent, $_FILES['image']);
            $this->redirect('/admin/events');
        }

        if (!empty($params)) {
            $event = Events::findById($params[0]);

            $this->template->setParam('event', $event);

            return $this->render();
        }
        return null;
    }

    public function actionDelete(array $params)
    {
        if (!empty($params)) {
            Events::deleteById($params[0]);
        }
        return $this->redirect('/admin/events');
    }
}