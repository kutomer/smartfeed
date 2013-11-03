<?php
class ActivityItem {
    public $guid;
    public $title;
    public $type;
    public $description;

    function __construct($guid, $type , $title, $description)
    {
        $this->guid = $guid;
        $this->title = $title;
        $this->type = $type;
        $this->description = $description;
    }
}