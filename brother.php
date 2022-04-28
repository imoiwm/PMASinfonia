<!DOCTYPE html>
<?php 
session_start(); // start session
$initialized = false; // start test
if (!isset($_POST["user"]) || !isset($_POST["pass"])) {
    if (!isset($_SESSION["User"]) || !isset($_SESSION["Pass"])) {
        header("Location: login.php");
        exit();
    } else {
        $initialized = true;
    } // if already present, set initialized to true
} // see if info was submitted or already present
include_once("processes/encrypt.php");
require_once("template.php"); // get encryption and template code
if (!$initialized) {
    $_SESSION["User"] = $_POST["user"];
    $_SESSION["Pass"] = htmlspecialchars($_POST["pass"]);
} //  if not already initialized, initialize it
?>
<html lang="en-US">
    <head>
        <title>Profile</title>
        <?php
        headInfo("Profile", "Profile, View Profile", ["profile"]); // print common head tags
        jsFile("validate"); // get validate.js
        ?>
    </head>
    <body>
        <?php
        include("containers/brothers.php");
        include_once("private/defined.php");
        head(1); // header with profile activated
         $conn = false; // empty set
         try {
            if ($test === null) exit();
           // set the PDO error mode to exception
           $test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $stmt = $test->prepare("CALL getBrother(:u);"); // gets brothers information
           $stmt->bindParam(":u", $username); // map variables
           $username = htmlspecialchars($_SESSION["User"]); // initialize variables
            $stmt->execute(); // execute
             
            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $it) {
                $conn = true; // not empty
                $ev = new Brothers($it); // parse brother info
                $_SESSION["ID"] = $ev->getID(); // get brother id
                $str = ($initialized) ? $it["Password"] : decrypt(htmlspecialchars($it["Password"]), htmlspecialchars($_SESSION["User"]));
                // get comparison string based on if the credentials were already initialized
                if (strcmp($_SESSION["Pass"], $str) == 0) {
                    $_SESSION["Pass"] = htmlspecialchars($it["Password"]);
                } else {
                    session_unset();
                    header("Location: login.php");
                    exit();
                } // if strings match, assign password to encrypted password, else, logout
                echo $ev->maxInfo(); // print brother info
            }
            echo "<p>Password Reset " . ((isset($_COOKIE["times"])) ? $_COOKIE["times"] : "0") . " times within 24 hours.</p>";
         } catch(PDOException $e) {
             $conn = true;
           echo "<h1><b>Connection failed:</b></h1>\n<p>Sorry, we could not connect with the server.
            Try again in a few hours.</p>" /*. $e->getMessage()*/; // error screen
         }
         $stmt->closeCursor(); // always close cursor
         if (!$conn) {
             echo "<p>There are no brothers by that username yet.</p>";
             session_unset();
         } // if set is empty, unset session
         echo "</div>";
         foot(); // footer
        ?>
    </body>
</html>