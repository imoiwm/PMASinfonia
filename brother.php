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
include_once("encrypt.php");
if (!$initialized) {
    $_SESSION["User"] = $_POST["user"];
    $_SESSION["Pass"] = htmlspecialchars($_POST["pass"]);
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
        include_once("private/defined.php");
         $conn = false;
         try {
            if ($test === null) exit();
           // set the PDO error mode to exception
           $test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $stmt = $test->prepare("CALL getBrother(:u);");
           $stmt->bindParam(":u", $username);
           $username = htmlspecialchars($_SESSION["User"]);
            $stmt->execute();
             
            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $it) {
                $conn = true;
                $ev = new Brothers($it);
                $_SESSION["ID"] = $ev->getID();
                $str = ($initialized) ? $it["Password"] : decrypt(htmlspecialchars($it["Password"]), htmlspecialchars($_SESSION["User"]));
                if (strcmp($_SESSION["Pass"], $str) == 0) {
                    $_SESSION["Pass"] = htmlspecialchars($it["Password"]);
                } else {
                    header("Location: login.html");
                    exit();
                }
                echo $ev->maxInfo();
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