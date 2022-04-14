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
        <img class=\"brother-picture\" src=\"" . parent::checkPicture(parent::getArray()["Picture"]) . "\" alt=\"$fullName's picture\"/>
        <header class=\"brother-header\">
        <h3 class=\"brother-name\">$fullName</h3>
        </header>
        </div>";
    }

    function maxInfo(): string {
        $fullName = parent::getArray()["FirstName"] . " " . parent::getArray()["LastName"];
        return '<div class="brother" id="brother-' . ($this->id = parent::getArray()["ID"]) . '">
        <section id="left-section">
        <img class="brother-picture" src="' . parent::checkPicture(parent::getArray()["Picture"]) . '" alt="' . $fullName . '\'s picture"/>
        <form action="processes/changePicture.php" method="post" enctype="multipart/form-data">
        <label for="image" class="change-button">Choose File
        <input type="file"  class="change-button" name="image" id="image">
        </label>
        <input class="change-button" type="submit" value="Upload Image">
        </form>
        </section>
        <section id="right-section">
        <header class="brother-header">
        <h1 class="brother-name">Welcome, ' . $fullName . '</h1>
        <hr/>
        </header>
        <form action="processes/changeEmail.php" method="post">
        <input type="hidden" id="id" name="id" value="' . $this->id . '">
        <label for="email" class="text">Email:</label>
        <input type="email" id="email" class="text-box" name="email" placeholder="no email entered" value="' . htmlspecialchars(parent::getArray()["Email"]) . '" required>
        <input class="change-button" type="submit" value="Change Email">
        </form>
        <br>
        <form action="processes/changeBio.php" method="post">
        <label for="bio" class="text">About Me:</label>
        <textarea id="bio" name="bio" class="text-box" placeholder="no description"  maxlength="2000" required>'
        . htmlspecialchars(parent::getArray()["Bio"]) .
        '</textarea>
        <br>
        <input class="change-button" type="submit" value="Change Bio">
        </form>
        </section>
        </div>';
    }
}
?>