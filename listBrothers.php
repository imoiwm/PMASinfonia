<!DOCTYPE html>
<?php require_once("template.php"); ?>
<html lang="en-US">
    <head>
        <title>Brothers</title>
        <?php headInfo("Brothers", "Brothers, Brothers List, List of Brothers", ["brothers"]); ?>
    </head>
    <body id="calendar-body">
        <!--Bootstrap navbar w/ Brothers highlighted-->
        <?php head(2); ?>
        <h1>Brothers</h1>
        <?php
         echo   "<div class=\"brothers-collection\">";
         include("containers/brothers.php");
         require_once("private/defined.php"); // get required code
         $conn = false; // empty
         try {
            if ($test === null) exit();
           // set the PDO error mode to exception
           $test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $stmt = $test->prepare("CALL getBrothers();"); // get information from brothers
            $stmt->execute(); // execute
             
            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $it) {
                $conn = true; // not empty anymore
                $ev = new Brothers($it); // parse brother data
                echo $ev->info(); // print info
            } // for each brother
         } catch(PDOException $e) {
             $conn = true;
           echo "<h1><b>Connection failed:</b></h1>\n<p>Sorry, we could not connect with the server.
            Try again in a few hours.</p>" /*. $e->getMessage()*/;
         } // catch and display error message
         $stmt->closeCursor(); // always close cursor
         if (!$conn) {
             echo "<p>There are currently no upcoming brothers yet.</p>";
         } // no brothers screen
         echo "</div>";
        ?>
        <?php foot(); ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>