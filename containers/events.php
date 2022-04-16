<?php
include_once("container.php");
class Events extends Container {
    private int $id = 0;
    function __construct($it) {
        parent::__construct($it);
    }

    function info(): string {
        return "<a href=\"reviews.php?which=e&id=" . ($this->id = parent::getArray()["ID"]) . "\">
        <div class=\"event\" id=\"event-" . ($this->id = parent::getArray()["ID"]) . "\">
        <header class=\"event-header\">
        <h3 class=\"event-title\">" . parent::getArray()["EventTitle"] . "</h3>
        <div class=\"date-location\">
        <p class=\"event-date\">" . parent::getArray()["EventDay"] . "</p>
        <address class=\"event-location\">" . parent::getArray()["EventLocation"] . "</address>
        </div>
        </header>
        <p class=\"event-description\">" . parent::getArray()["EventDescription"] . "</p>
        </div>
        </a>";
    }
}
?>