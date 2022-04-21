<?php
include_once("container.php");
/*
 * Contains the information for the brothers table
 * Extends from Container class
 */
class Brothers extends Container {
    private int $id = 0; // the id of the brother

    /*
     * Constructor of the brothers class
     * Preconditions: none
     * Postconditions: none
     * Parameters:
     * $it: associative array to feed to $this->ar
     * Returns: none
     */
    function __construct($it) {
        parent::__construct($it);
        $this->id = $it["ID"];
    }

    /* override of container class */
    function getID(): int {
        return $this->id;
    }

    /*
     * Gets the minimal information of a container in html
     * Preconditions: none
     * Postconditions: none
     * Parameters: none
     * Returns:
     * The information in a html formatted string
     * Includes:
     * FullName, ID, Picture
     */
    function info(): string {
        $fullName = parent::getArray()["FirstName"] . " " . parent::getArray()["LastName"];
        return "<div class=\"brother\" id=\"brother-" . ($this->id = parent::getArray()["ID"]) . "\">
        <img class=\"brother-picture\" src=\"" . parent::checkPicture(parent::getArray()["Picture"]) . "\" alt=\"$fullName's picture\"/>
        <header class=\"brother-header\">
        <h3 class=\"brother-name\">$fullName</h3>
        </header>
        </div>";
    }

    /*
     * Gets the maximum information of a container in html
     * Preconditions: none
     * Postconditions: none
     * Parameters: none
     * Returns:
     * The information in a html formatted string
     * Includes:
     * FullName, ID, Picture, Email, Bio
     */
    function maxInfo(): string {
        $fullName = parent::getArray()["FirstName"] . " " . parent::getArray()["LastName"];
        return '<div class="brother" id="brother-' . ($this->id = parent::getArray()["ID"]) . '">
        <section id="left-section">
        <img class="brother-picture" src="' . parent::checkPicture(parent::getArray()["Picture"]) . '" alt="' . $fullName . '\'s picture"/>
        <form id="image-form" action="processes/changePicture.php" method="post" enctype="multipart/form-data" onsubmit="return validate(\'image-form\');">
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
        <form id="email-form" action="processes/changeEmail.php" method="post" onsubmit="return validate(\'email-form\');">
        <input type="hidden" id="id" name="id" value="' . $this->id . '">
        <label for="email" class="text">Email:</label>
        <input type="email" id="email" class="text-box" name="email" placeholder="no email entered" value="' . htmlspecialchars(parent::getArray()["Email"]) . '" required>
        <input class="change-button" type="submit" value="Change Email">
        </form>
        <br>
        <form id="bio-form" action="processes/changeBio.php" method="post" onsubmit="return validateTextArea(\'bio-form\');">
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

    /*
     * Gets the information of a container in xml
     * Preconditions: none
     * Postconditions: none
     * Parameters: none
     * Returns:
     * The information in a xml formatted string
     * Includes:
     * FullName, ID, Picture, Email, Bio
     */
    function xmlInfo(): string {
        $fullName = parent::getArray()["FirstName"] . " " . parent::getArray()["LastName"];
        return '<BROTHER>
        <ID>' . ($this->id = parent::getArray()["ID"]) . '</ID>
        <IMGPATH>' . parent::checkPicture(parent::getArray()["Picture"]) . '</IMGPATH>
        <NAME>' . $fullName . '</NAME>
        <EMAIL>' . htmlspecialchars(parent::getArray()["Email"]) . '</EMAIL>
        <BIO>' . htmlspecialchars(parent::getArray()["Bio"]) . '</BIO>
        </BROTHER>';
    }
}
?>