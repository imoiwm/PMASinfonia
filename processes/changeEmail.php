<!DOCTYPE html>
<?php 
session_start();
if (!isset($_SESSION["User"]) || !isset($_SESSION["Pass"]) || !isset($_SESSION["ID"])
    || (!isset($_POST["email"]) && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false)) {
    header("Location: login.html");
    exit();
}

include_once("../private/defined.php");

$conn = false;
try {
    if ($test === null) exit();
    // set the PDO error mode to exception
    $test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $test->prepare("CALL updateBrotherEmail(:eml, :id, :u, :p);");
    $stmt->bindParam(":eml", $email);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":u", $username);
    $stmt->bindParam(":p", $password);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $id = (filter_var($_SESSION["ID"], FILTER_VALIDATE_INT) === 0 
            || !filter_var($_SESSION["ID"], FILTER_VALIDATE_INT) === false) ? $_SESSION["ID"] : 0;
    $username = htmlspecialchars($_SESSION["User"]);
    $password = htmlspecialchars($_SESSION["Pass"]);
    $stmt->execute();
    header("Location: ../brother.php");
    exit();
} catch(PDOException $e) {
    $conn = true;
    echo "<h1><b>Connection failed:</b></h1>\n<p>Sorry, we could not connect with the server.
        Try again in a few hours.</p>" /*. $e->getMessage()*/;
}
$stmt->closeCursor();
if (!$conn) {
    echo "<p>There are currently no upcoming brothers yet.</p>";
}
echo "</div>";
?>