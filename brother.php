<!DOCTYPE html>
<?php 
if (!in_array("user", array_keys($_POST)) || !in_array("pass", array_keys($_POST))) {
    header("Location: login.html");
    exit();
}
session_start();
$_SESSION["User"] = $_POST["user"];
$_SESSION["Pass"] = $_POST["pass"];
setcookie("Test", 100, 3600);
?>
<html>
    <head>
        <title>Profile</title>
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
           $stmt = $test->prepare("CALL getBrothers();");
            $stmt->execute();
             
            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $it) {
                $conn = true;
                $ev = new Brothers($it);
                echo $ev->info();
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
         if (isset($_COOKIE["Test"])) {
             echo "Test cookie " . $_COOKIE["Test"] . " worked";
         }
         echo "</div>";
        ?>
    </body>
</html>