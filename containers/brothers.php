<?php
include_once("container.php");
class Brothers extends Container {
    private int $id = 0;
    function __construct($it) {
        parent::__construct($it);
        $this->id = $it["ID"];
    }

    function getID(): int {
        return $this->id;
    }

    function info(): string {
        $fullName = parent::getArray()["FirstName"] . " " . parent::getArray()["LastName"];
        return "<div class=\"brother\" id=\"brother-" . ($this->id = parent::getArray()["ID"]) . "\">
        <header class=\"brother-header\">
        <h3 class=\"brother-name\">$fullName</h3>
        \n</header>
        \n<img class=\"brother-picture\" src=\"" . parent::checkPicture(parent::getArray()["Picture"]) . "\" alt=\"$fullName's picture\"/>
        \n</div>";
    }

    function maxInfo(): string {
        $fullName = parent::getArray()["FirstName"] . " " . parent::getArray()["LastName"];
        return '<div class="brother" id="brother-' . ($this->id = parent::getArray()["ID"]) . '">
        <header class="brother-header">
        <h3 class="brother-name">' . $fullName . '</h3>
        </header>
        <img class="brother-picture" src="' . parent::checkPicture(parent::getArray()["Picture"]) . '" alt="' . $fullName . '\'s picture"/>
        <form action="changePicture.php" method="post" enctype="multipart/form-data">
        <label for="image">Select image to upload:</label>
        <input type="file" name="image" id="image">
        <input type="submit" value="Upload Image">
        </form>
        <form action="changeEmail.php" method="post">
        <input type="hidden" id="id" name="id" value="' . $this->id . '">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="no email entered" value="' . htmlspecialchars(parent::getArray()["Email"]) . '" pattern="
        (?:[a-z0-9!#$%&\'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@
        (?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|
        1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])"
        required>
        <input type="submit" value="Change Email">
        </form>
        <br>
        <form action="changeBio.php" method="post">
        <label for="bio">About Me:</label>
        <textarea id="bio" name="bio" placeholder="no description"  maxlength="2000" required>'
        . htmlspecialchars(parent::getArray()["Bio"]) .
        '</textarea>
        <br>
        <input type="submit" value="Change Bio">
        </form>
        </div>';
    }
}
?>