<?php

namespace models;

use core\Model;

/**
 * @property int $id ID of events
 * @property string $title Title of events
 * @property string $description Description of events
 * @property string $start_date Start date of events
 * @property string $end_date End date of events
 * @property string $image Path to image of events
 */
class Events extends Model
{
    public static $tableName = 'events';


}