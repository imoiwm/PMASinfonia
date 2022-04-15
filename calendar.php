<!DOCTYPE html>
<?php require_once("template.php"); ?>
<html lang="en-US">
    <head>
        <title>Calendar</title>
        <?php headInfo("Calendar", "Calendar, Events", []); ?>
    </head>
    <body id="calendar-body">
        <?php
         head();
         echo   "<div class=\"events-collection\">";
         include("containers/events.php");
         include_once("private/defined.php");
         $conn = false;
         try {
            if ($test === null) exit();
           // set the PDO error mode to exception
           $test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $stmt = $test->prepare("CALL getEvents();");
            $stmt->execute();
             
            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $it) {
                $conn = true;
                $ev = new Events($it);
                echo $ev->info();
            }
            $stmt->closeCursor();
         } catch(PDOException $e) {
             $conn = true;
           echo "<h1><b>Connection failed:</b></h1>\n<p>Sorry, we could not connect with the server.
            Try again in a few hours.</p>" /*. $e->getMessage()*/;
         }
         if (!$conn) {
             echo "<p>There are currently no upcoming events yet.</p>";
         }
         echo "</div>";
         foot();
        ?>
    </body>
</html>