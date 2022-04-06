<?php
include_once("container.php");
class Events extends Container {
    private int $id = 0;
    function __construct($it) {
        parent::__construct($it);
    }

    function info(): string {
        return "<div class=\"event\" id=\"event-" . ($this->id = parent::getArray()["ID"]) . "\">
        <header class=\"event-header\">
        <h3 class=\"event-title\">" . parent::getArray()["EventTitle"] . "</h3>\n
        <div class=\"date-location\">
        <p class=\"event-date\">" . parent::getArray()["EventDay"] . "</p>\n
        <address class=\"event-location\">" . parent::getArray()["EventLocation"] . "</address>
        \n</div>
        \n</header>
        \n<p class=\"event-description\">" . parent::getArray()["EventDescription"] . "</p>
        \n</div>";
    }
}
?>