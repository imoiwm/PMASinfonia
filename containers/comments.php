<?php
include_once("container.php");
/*
 * Contains the information for the comments table
 * Extends from Container class
 */
class Comments extends Container {
    private int $id; // the id of the comment

    /*
     * Constructor of the comments class
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
     * Text, ID, Name of Brother, Liked
     */
    function info(): string {
        $str = (parent::getArray()["Liked"]) ? "Liked" : "Disliked";
        return "<div class=\"card mb-3\" id=\"comment-" . ($this->id = parent::getArray()["ID"]) . "\">
        <div class=\"card-body\">" . parent::getArray()["Text"] . "</div>
        <div class=\"card-footer\"><small>" . parent::getArray()["BrotherName"] . " " . $str . "</small></div>
        </div>";
    }

    /*
     * Gets the information of a container in xml
     * Preconditions: none
     * Postconditions: none
     * Parameters: none
     * Returns:
     * The information in a xml formatted string
     * Includes:
     * Text, ID, Name of Brother, Liked
     */
    function xmlInfo(): string {
        $str = (parent::getArray()["Liked"]) ? "Liked" : "Disliked";
        return "<COMMENT>
        <ID>" . ($this->id = parent::getArray()["ID"]) . "</ID>
        <TEXT>" . parent::getArray()["Text"] . "</TEXT>
        <BROTHER>" . parent::getArray()["BrotherName"] . "</BROTHER>
        <LIKED>" . $str . "</LIKED>
        </COMMENT>";
    }
}

?>