<?php
class ActivityItem {
    private $guid;
    private $title;
    private $type;
    private $description;

    function __construct($guid, $type , $title, $description)
    {
        $this->guid = $guid;
        $this->title = $title;
        $this->type = $type;
        $this->description = $description;
    }
}