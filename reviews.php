<!DOCTYPE html>
<?php
require_once("template.php");
if (!(isset($_GET["which"]) && ($_GET["which"] === 'm' || $_GET["which"] === 'e')) || !(isset($_GET["id"]) && filter_var($_GET["id"], FILTER_VALIDATE_INT))) {
    header("Location: history.php");
    exit();
} // see if information is given, redirect if not
session_start(); // start session
?>
<html lang="en-US">
    <head>
        <title>Merch Page</title>
        <?php
        headInfo("Reviews", "Merch Reviews, Event Comments", ["review"]);
        jsFile("validate"); // to validate input
        ?>
    </head>
    <body id="review-body">
        <?php head(); ?>
        <div id="view">
            <h1>
                <?php echo ($_GET["which"] === 'm') ? "Merchandise" : "Event"; ?>
            </h1>
            <hr/>
            <?php
             include_once("containers/comments.php");
             include_once("containers/merchandise.php");
             include_once("containers/events.php");
             include_once("private/defined.php"); // get required info and classes
             $conn = false; // empty set
             $proc = ($_GET["which"] === 'm') ? "getMerch()" : "getEvents()"; // depends on if event or merch
             try {
                if ($test === null) exit();
               // set the PDO error mode to exception
               $test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $stmt = $test->prepare("CALL $proc;"); // gets reviewee info
                $stmt->execute(); // executes

                // set the resulting array to associative
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $it) {
                    $conn = true; // not empty anymore
                    $ev = ($_GET["which"] === 'm') ? new Merchandise($it) : new Events($it); // gets container
                    if (filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT) != $ev->getID()) continue; // continues if not the right one
                    echo $ev->reviewInfo(); // prints review info
                    break; // found the right one
                }
                $stmt->closeCursor(); // close cursor

                if (isset($_SESSION["User"]) && isset($_SESSION["Pass"])) {
                    echo '<form class="container mb-3 mt-3 bg-light rounded" id="brother-comment-form" method="post" action="processes/comment.php" onsubmit="return validateTextArea(\'brother-comment-form\');">
                    <input type="hidden" id="wh" name="wh" value="' . $_GET["which"] . '"/>
                    <input type="hidden" id="whid" name="whid" value="' . $_GET["id"] . '"/>
                    <label class="form-label" for="text">Comment:</label>
                    <textarea class="form-control" name="text" id="text" maxlength="1900" required></textarea>
                    <div class="form-check">
                    <label for="liked" class="form-check-label">Like</label>
                    <input type="checkbox" class="form-check-input" name="liked" id="liked"/>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Comment"/>
                    </form>';
                } // if user is logged in, let them comment on the event/merch

                // Comments
                echo '<div class="container" id="comments">
                    <h3>Comments:</h3>';
                $stmt = $test->prepare("CALL getComments(:wh, :whid);"); // get comments
                $stmt->bindParam(":wh", $which);
                $stmt->bindParam(":whid", $id); // map variables
                $which = $_GET["which"];
                $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT); // initialize variables
                $stmt->execute(); // execute
                // set the resulting array to associative
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $it) {
                    $conn = true; // not empty anymore
                    $ev = new Comments($it); // parse comment
                    echo $ev->info(); // print comment info
                } // for each comment
                $stmt->closeCursor(); // close cursor
                echo "</div>";
             } catch(PDOException $e) {
                 $conn = true;
               echo "<h1><b>Connection failed:</b></h1>\n<p>Sorry, we could not connect with the server.
                Try again in a few hours.</p>" /*. $e->getMessage()*/;
             } // if caught, display error screen 
             if (!$conn) {
                 echo "<p>There are no items yet.</p>";
             } // if empty, display empty screen
            ?>
        </div>
        <?php foot(); ?>
    </body>
</html>