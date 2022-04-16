<?php
include_once("container.php");
class Comments extends Container {
    private int $id;
    function __construct($it) {
        parent::__construct($it);
    }

    function info(): string {
        $str = (parent::getArray()["Liked"]) ? "Liked" : "Disliked";
        return "<div class=\"comment\" id=\"comment-" . ($this->id = parent::getArray()["ID"]) . "\">
        <p class=\"comment-text\">" . parent::getArray()["Text"] . "</p>
        <span class=\"comment-liked\">" . parent::getArray()["BrotherName"] . " " . $str . "</span>
        </div>";
    }
}

?>