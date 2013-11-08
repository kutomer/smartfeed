<?php
class ActivityItem
{
    public $guid;
    public $title;
    public $type;
    public $description;
    public $timeCreated;

    function __construct($guid, $time_created, $type, $title, $description)
    {
        $this->guid = $guid;
        $this->timeCreated = $time_created;
        $this->title = $title;
        $this->type = $type;
        $this->description = $description;
    }
}