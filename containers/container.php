<?php 
/*
 * Abstract class that contains data and parses it into either html or xml code
 * as a string.
 * Known derived classes:
 *  Brothers
 *  Events
 *  Comments
 *  Merchandise
 */
abstract class Container {

    private $ar; // associative array of results

    /*
     * Constructor of the container class
     * Preconditions: none
     * Postconditions: none
     * Parameters:
     * $it: associative array to feed to $this->ar
     * Returns: none
     */
    function __construct($it) {
        $this->ar = $it;
    }

    /*
     * Gets the underlying array for the children to use
     * Preconditions: none
     * Postconditions: none
     * Parameters: none
     * Returns:
     * $this->ar
     */
    protected function getArray() {
        return $this->ar;
    }

    /*
     * Checks to see if a string is a picture or a representation of NULL
     * Preconditions: none
     * Postconditions: none
     * Parameters:
     * string $source: string to check
     * Returns:
     * Either a path to an "no image" image on no image or $source
     */
    protected function checkPicture(string $source): string {
        if (strcmp($source, "no img") !== 0) {
            return $source;
        } // if $source does not equal no image, it is good
        return "img/no_img.png"; // else, redirect image path
    }

    /*
     * Gets the id of a container if set
     * Preconditions: none
     * Postconditions: none
     * Parameters: none
     * Returns:
     * Either the id number or -1 if not set
     */
    function getID(): int {
        return (in_array("ID", array_keys($this->ar))) ? $this->ar["ID"] : -1;
    }

    /*
     * Gets the information of a container in html
     * Preconditions: none
     * Postconditions: none
     * Parameters: none
     * Returns:
     * The information in a html formatted string
     */
    abstract function info(): string;

    /*
     * Gets the information of a container in xml
     * Preconditions: none
     * Postconditions: none
     * Parameters: none
     * Returns:
     * The information in a xml formatted string
     */
    abstract function xmlInfo(): string;
}
?>