<?php
class Activity
{
    public $guid;
    public $timeCreated;
    public $action;
    public $description;
    public $actor;
    public $target;
    public $relatedObject;

    public function __construct($guid, $time_created, $action, $description, ActivityItem $actor, ActivityItem $target, ActivityItem $relatedObject)
    {
        $this->guid = $guid;
        $this->timeCreated = $time_created;
        $this->action = $action;
        $this->description = $description;
        $this->actor = $actor;
        $this->target = $target;
        $this->relatedObject = $relatedObject;
    }
} 