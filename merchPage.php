<!DOCTYPE html>
<?php require_once("template.php"); ?>
<html lang="en-US">
    <head>
        <title>Merch Page</title>
        <?php headInfo("Merchandise", "Merch, Products", ["merch"]); ?>
    </head>
    <body id="merch-body">
        <?php head(5); ?>
        <div id="view">
            <h1>Merchandise</h1>
            <hr/>
            <?php
             echo   "<div class=\"merch-collection\">";
             echo   "<div class=\"container mt-4\">";
             echo   "<div class=\"row\">";
             include("containers/merchandise.php");
             include_once("private/defined.php");
             $conn = false; // empty set
             try {
                if ($test === null) exit();
               // set the PDO error mode to exception
               $test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $stmt = $test->prepare("CALL getMerch();"); // get merch info
                $stmt->execute(); // execute

                // set the resulting array to associative
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $it) {
                    $conn = true; // not empty anymore
                    $ev = new Merchandise($it); // parse merch info
                    echo $ev->info(); // display merchandise info
                } // for each merchandise, display info
                $stmt->closeCursor(); // close cursor
             } catch(PDOException $e) {
                 $conn = true;
               echo "<h1><b>Connection failed:</b></h1>\n<p>Sorry, we could not connect with the server.
                Try again in a few hours.</p>" /*. $e->getMessage()*/;
             } // if error is caught, display exception screen
             if (!$conn) {
                 echo "<p>There are no items yet.</p>";
             } // empty merch screen
             echo "</div>";
             echo "</div>";
             echo "</div>";

            ?>
        </div>
        <?php foot(); ?>
    </body>
</html>