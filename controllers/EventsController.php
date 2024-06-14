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
}