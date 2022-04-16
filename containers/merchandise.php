<?php
include_once("container.php");
class Merchandise extends Container {
    private int $id;
    function __construct($it) {
        parent::__construct($it);
    }

    function info(): string {
        return "<a href=\"reviews.php?which=m&id=" . ($this->id = parent::getArray()["ID"]) . "\">
        <div class=\"merch\" id=\"merch-" . $this->id . "\">
        <img class=\"merch-image\" src=\"" . parent::checkPicture(parent::getArray()["Picture"]) . "\" alt=\"Merchandise Photo\"/>
        <div class=\"merch-other\">
        <header class=\"merch-header\">
        <h3 class=\"merch-name\">" . parent::getArray()["MerchName"] . "</h3>
        <div class=\"date-location\">
        <p class=\"merch-quantity\">Quantity: " . parent::getArray()["MerchQuantity"] . "</p>
        </div>
        </header>
        <hr class=\"merch-hr\"/>
        <p class=\"merch-description\">" . parent::getArray()["MerchDescription"] . "</p>
        </div>
        </div>
        </a>";
    }
}
?>