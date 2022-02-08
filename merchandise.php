<?php
include_once("container.php");
class Merchandise extends Container {
    private int $id;
    function __construct($it) {
        parent::__construct($it);
    }

    function info(): string {
        return "<div class=\"merch\" id=\"merch-" . ($this->id = parent::getArray()["ID"]) . "\">
        <header class=\"merch-header\">
        <h3 class=\"merch-name\">" . parent::getArray()["MerchName"] . "</h3>\n
        <div class=\"date-location\">
        <p class=\"merch-quantity\">" . parent::getArray()["MerchQuantity"] . "</p>\n
        <img class=\"merch-image\" src=\"" . parent::checkPicture(parent::getArray()["Picture"]) . "\" alt=\"Merchandise Photo\"/>
        \n</div>
        \n</header>
        \n<p class=\"merch-description\">" . parent::getArray()["MerchDescription"] . "</p>
        \n</div>";
    }
}
?>