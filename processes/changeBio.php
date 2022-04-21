<!DOCTYPE html>
<?php 
session_start(); // start session (server variables initialized)
if (!isset($_SESSION["User"]) || !isset($_SESSION["Pass"])
    || !isset($_SESSION["ID"]) || !isset($_POST["bio"])) {
    header("Location: login.php");
    exit();
} // if the user is unauthenticated, go back to the login page

include_once("../private/defined.php");

$conn = false; // if there was anything in the result set
try {
    if ($test === null) exit();
    // set the PDO error mode to exception
    $test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $test->prepare("CALL updateBrotherBio(:bio, :id, :u, :p);");
    $stmt->bindParam(":bio", $bio);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":u", $username);
    $stmt->bindParam(":p", $password); // bind all required variables
    $bio = htmlspecialchars($_POST["bio"]);
    $id = (filter_var($_SESSION["ID"], FILTER_VALIDATE_INT) === 0 
            || !filter_var($_SESSION["ID"], FILTER_VALIDATE_INT) === false) ? $_SESSION["ID"] : 0;
    $username = htmlspecialchars($_SESSION["User"]);
    $password = htmlspecialchars($_SESSION["Pass"]); // initialize variables with filtered input
    $stmt->execute(); // update
    $stmt->closeCursor(); // close the cursor
    header("Location: ../brother.php");
    exit(); // go back to brother page
} catch(PDOException $e) {
    $conn = true;
    echo "<h1><b>Connection failed:</b></h1>\n<p>Sorry, we could not connect with the server.
        Try again in a few hours.</p>" /*. $e->getMessage()*/;
} // if it failed, display error message
$stmt->closeCursor(); // close the cursor
if (!$conn) {
    echo "<p>There are currently no upcoming brothers yet.</p>";
} // if no entries, display this
echo "</div>";
?>