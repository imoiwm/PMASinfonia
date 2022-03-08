<!DOCTYPE html>
<?php 
session_start();
$initialized = false;
if (!isset($_POST["user"]) || !isset($_POST["pass"])) {
    if (!isset($_SESSION["User"]) || !isset($_SESSION["Pass"])) {
        header("Location: login.html");
        exit();
    } else {
        $initialized = true;
    }
}
if (!$initialized) {
    $_SESSION["User"] = $_POST["user"];
    $_SESSION["Pass"] = $_POST["pass"];
}
?>
<html>
    <head>
        <title>Profile</title>
        <link rel="stylesheet" type="text/css" href="normalize.css">
    </head>
    <body>
        <?php
        include("brothers.php");
        include_once("defined.php");
         $conn = false;
         try {
            $test = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DATABASE_NAME, USERNAME, PASSWORD);
           // set the PDO error mode to exception
           $test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $stmt = $test->prepare("CALL getBrother(:u, :p);");
           $stmt->bindParam(":u", $username);
           $stmt->bindParam(":p", $password);
           $username = htmlspecialchars($_SESSION["User"]);
           $password = htmlspecialchars($_SESSION["Pass"]);
            $stmt->execute();
             
            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $it) {
                $conn = true;
                $ev = new Brothers($it);
                echo $ev->maxInfo();
                $_SESSION["ID"] = $ev->getID();
            }
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
    </body>
</html>