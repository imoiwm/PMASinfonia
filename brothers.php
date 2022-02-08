<?php
include_once("container.php");
class Brothers extends Container {
    private int $id = 0;
    function __construct($it) {
        parent::__construct($it);
    }

    function info(): string {
        return "<div class=\"brother\" id=\"brother-" . ($this->id = parent::getArray()["ID"]) . "\">
        <header class=\"brother-header\">
        <h3 class=\"brother-name\">" . parent::getArray()["FirstName"] . " " . parent::getArray()["LastName"] . "</h3>
        \n</header>
        \n<img class=\"brother-picture\" src=\"" . parent::checkPicture(parent::getArray()["Picture"]) . "\" alt=\"brother picture\"/>
        \n</div>";
    }
}
?>