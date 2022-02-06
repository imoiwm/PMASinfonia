<?php
include("container.php");
class Events extends Container {
    private static int $id = 0;
    function __construct($it) {
        parent::__construct($it);
    }

    function info(): string {
        return "<div class=\"event\" id=\"event-" . Events::$id++ . "\">
        <header class=\"event-header\">
        <h3 class=\"event-title\">" . parent::getArray()["EventTitle"] . "</h3>\n
        <div class=\"date-location\">
        <p class=\"event-date\">" . parent::getArray()["EventDay"] . "</p>\n
        <p class=\"event-location\">" . parent::getArray()["EventLocation"] . "</p>
        \n</div>
        \n</header>
        \n<p class=\"event-description\">" . parent::getArray()["EventDescription"] . "</p>
        \n</div>";
    }
}
?>