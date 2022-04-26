<!DOCTYPE html>
<?php require_once("template.php"); ?>
<html lang="en-US">
    <head>
        <title>Brothers</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/bsstyle.css">
        <?php headInfo("Brothers", "Brothers, Brothers List, List of Brothers", ["brothers"]); ?>
    </head>
    <body id="calendar-body">
                <!--Bootstrap navbar w/ Brothers highlighted-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <span class="pma">ΦMA</span>
                    <span class="dawgs">Dawgs</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="home.html">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="bsbrothers.php">Brothers</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="bscalendar.php">Calendar</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="bshistory.php">History</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <h1>Brothers</h1>
        <?php
         echo   "<div class=\"brothers-collection\">";
         include("containers/brothers.php");
         require_once("private/defined.php");
         $conn = false;
         try {
            if ($test === null) exit();
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
         echo "</div>";
        ?>
        <footer class="footer mt-auto py-3 bg-light">
            <div class="container">
                <span class="text-muted">Copyright © 2020 Phi Mu Alpha Sinfonia Fraternity of America | All Rights Reserved</span>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>