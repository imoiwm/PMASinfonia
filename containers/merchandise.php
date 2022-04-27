<?php
include_once("container.php");
/*
 * Contains the information for the merchandise table
 * Extends from Container class
 */
class Merchandise extends Container {
    private int $id; // the id of the merch

    /*
     * Constructor of the merchandise class
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
     * ID, Picture, Name, Quantity, Description
     */
    function info(): string {
        return "
        <div class=\"card\" style=\"width: 18rem;\" id=\"merch-" . parent::getArray()["ID"] . "\">
        <img class=\"card-img-top\" alt=\"...\" src=\"" . parent::checkPicture(parent::getArray()["Picture"]) . "\" alt=\"Merchandise Photo\"/>
        <div class=\"card-body\">
            <h5 class=\"card-title\">"  . parent::getArray()["MerchName"] . "</h5>
            <p class=\"card-text\">" . parent::getArray()["MerchDescription"] . "</p>
        </div>
        <ul class=\"list-group list-group-flush\">
            <li class=\"list-group-item\">Only " . parent::getArray()["MerchQuantity"] . " left!</li>
        </ul>
        <div class=\"card-body\">
            <a href=\"reviews.php?which=m&id=" . parent::getArray()["ID"] . "\"> Reviews</a>
        </div>";
        
/* 
         <div class=\"card\" id=\"merch-" . $this->id . "\">
         <img class=\"card-img-top\" src=\"" . parent::checkPicture(parent::getArray()["Picture"]) . "\" alt=\"Merchandise Photo\"/>
         <header class=\"merch-header\">
         <h3 class=\"card-title\">" . parent::getArray()["MerchName"] . "</h3>
         <div class=\"date-location\">
         <p class=\"card-text\">Quantity: " . parent::getArray()["MerchQuantity"] . "</p>
         </div>
         </header>
         <hr class=\"merch-hr\"/>
         <p class=\"card-text\">" . parent::getArray()["MerchDescription"] . "</p>
         </div>
         </a>"; 
*/

    }

    /*
     * Gets the information of a container in html
     * Preconditions: none
     * Postconditions: none
     * Parameters: none
     * Returns:
     * The information in a html formatted string
     * Includes:
     * ID, Picture, Name, Quantity, Description
     */
    function reviewInfo(): string {
        return "<div class=\"container-fluid row bg-secondary rounded\" id=\"merch-" . ($this->id = parent::getArray()["ID"]) . "\">
        <img class=\"merch-image col-4\" src=\"" . parent::checkPicture(parent::getArray()["Picture"]) . "\" alt=\"Merchandise Photo\"/>
        <div class=\"merch-other col-8\">
        <header class=\"row\">
        <h3 class=\"col-4\">" . parent::getArray()["MerchName"] . "</h3>
        <div class=\"col-8\">
        <p class=\"merch-quantity\">Quantity: " . parent::getArray()["MerchQuantity"] . "</p>
        </div>
        </header>
        <hr class=\"merch-hr\"/>
        <p class=\"merch-description\">" . parent::getArray()["MerchDescription"] . "</p>
        </div>
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
     * ID, Picture, Name, Quantity, Description
     */
    function xmlInfo(): string {
        return "<MERCH>
        <LINK>" . ($this->id = parent::getArray()["ID"]) . "</LINK>
        <ID>" . $this->id . "</ID>
        <IMGPATH>" . parent::checkPicture(parent::getArray()["Picture"]) . "</IMGPATH>
        <NAME>" . parent::getArray()["MerchName"] . "</NAME>
        <QUANTITY>" . parent::getArray()["MerchQuantity"] . "</QUANTITY>
        <DESCRIPTION>" . parent::getArray()["MerchDescription"] . "</DESCRIPTION>
        </MERCH>";
    }
}
?>