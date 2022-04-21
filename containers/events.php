<?php
include_once("container.php");
/*
 * Contains the information for the comments table
 * Extends from Container class
 */
class Events extends Container {
    private int $id = 0; // the id of the event

    /*
     * Constructor of the events class
     * Preconditions: none
     * Postconditions: none
     * Parameters:
     * $it: associative array to feed to $this->ar
     * Returns: none
     */
    function __construct($it) {
        parent::__construct($it);
    }

    /*
     * Gets the information of a container in html
     * Preconditions: none
     * Postconditions: none
     * Parameters: none
     * Returns:
     * The information in a html formatted string
     * Includes:
     * ID, Title, Date, Location, Description
     */
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

    /*
     * Gets the information of a container in xml
     * Preconditions: none
     * Postconditions: none
     * Parameters: none
     * Returns:
     * The information in a xml formatted string
     * Includes:
     * ID, Title, Date, Location, Description
     */
    function xmlInfo(): string {
        return "
        <EVENT>
        <ID>" . ($this->id = parent::getArray()["ID"]) . "</ID>
        <TITLE>" . parent::getArray()["EventTitle"] . "</TITLE>
        <DATE>" . parent::getArray()["EventDay"] . "</DATE>
        <LOCATION>" . parent::getArray()["EventLocation"] . "</LOCATION>
        <DESCRIPTION>" . parent::getArray()["EventDescription"] . "</DESCRIPTION>
        </EVENT>";
    }
}
?>