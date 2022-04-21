<?php 
session_start(); // start session (server variables initialized)
if (!isset($_SESSION["User"]) || !isset($_SESSION["Pass"])
    || !isset($_SESSION["ID"]) || !isset($_POST["wh"])
    || !isset($_POST["whid"]) || !isset($_POST["text"])) {
    header("Location: login.php");
    exit();
} // if the user is unauthenticated or post data is missing, go back to the login page

include_once("../private/defined.php");

$conn = false; // if there was anything in the result set
try {
    if ($test === null) exit();
    // set the PDO error mode to exception
    $test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $test->prepare("CALL createComment(:id, :ct, :wh, :l, :whid);");
    $stmt->bindParam(":id", $bid);
    $stmt->bindParam(":ct", $text);
    $stmt->bindParam(":wh", $which);
    $stmt->bindParam(":l", $liked);
    $stmt->bindParam(":whid", $which_id); // bind all required variables
    $bid = (filter_var($_SESSION["ID"], FILTER_VALIDATE_INT) === 0 
            || !filter_var($_SESSION["ID"], FILTER_VALIDATE_INT) === false) ? $_SESSION["ID"] : 0;
    $text = htmlspecialchars($_POST["text"]);
    $which = ($_POST["wh"] === 'm') ? 'm' : 'e';
    $liked = (int)((isset($_POST["liked"])) ? $_POST["liked"] == "on" : false);
    $which_id = (filter_var($_POST["whid"], FILTER_VALIDATE_INT) === 0 
            || !filter_var($_POST["whid"], FILTER_VALIDATE_INT) === false) ? intval($_POST["whid"]) : 0;
     // initialize variables with filtered input
    $stmt->execute(); // update
$stmt->closeCursor(); // close cursor
    header("Location: ../reviews.php?which=$which&id=$which_id");
    exit(); // redirect to the reviews page (refresh)
} catch(PDOException $e) {
    $conn = true;
    echo "<h1><b>Connection failed:</b></h1>\n<p>Sorry, we could not connect with the server.
        Try again in a few hours.</p>" /*. $e->getMessage()*/;
} // if connection failed, display the message
$stmt->closeCursor(); // close cursor
if (!$conn) {
    echo "<p>There are currently no upcoming brothers yet.</p>";
} // if there were no run throughs
echo "</div>";
?>