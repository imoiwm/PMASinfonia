<!DOCTYPE html>
<?php
require_once("template.php");
if (!(isset($_GET["which"]) && ($_GET["which"] === 'm' || $_GET["which"] === 'e')) || !(isset($_GET["id"]) && filter_var($_GET["id"], FILTER_VALIDATE_INT))) {
    header("Location: history.php");
    exit();
}
session_start();
?>
<html lang="en-US">
    <head>
        <title>Merch Page</title>
        <?php
        headInfo("Reviews", "Merch Reviews, Event Comments", ["review"]);
        jsFile("validate");
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
             include_once("private/defined.php");
             $conn = false;
             $proc = ($_GET["which"] === 'm') ? "getMerch()" : "getEvents()";
             try {
                if ($test === null) exit();
               // set the PDO error mode to exception
               $test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $stmt = $test->prepare("CALL $proc;");
                $stmt->execute();

                // set the resulting array to associative
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $it) {
                    $conn = true;
                    $ev = ($_GET["which"] === 'm') ? new Merchandise($it) : new Events($it);
                    if (filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT) != $ev->getID()) continue;
                    echo $ev->info();
                    break;
                }
                $stmt->closeCursor();

                // Comments
                $stmt = $test->prepare("CALL getComments(:wh, :whid);");
                $stmt->bindParam(":wh", $which);
                $stmt->bindParam(":whid", $id);
                $which = $_GET["which"];
                $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
                $stmt->execute();
                // set the resulting array to associative
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $it) {
                    $conn = true;
                    $ev = new Comments($it);
                    echo $ev->info();
                }
                $stmt->closeCursor();
             } catch(PDOException $e) {
                 $conn = true;
               echo "<h1><b>Connection failed:</b></h1>\n<p>Sorry, we could not connect with the server.
                Try again in a few hours.</p>" /*. $e->getMessage()*/;
             }
             if (!$conn) {
                 echo "<p>There are no items yet.</p>";
             }

             if (isset($_SESSION["User"]) && isset($_SESSION["Pass"])) {
                 echo '<form id="brother-comment-form" method="post" action="processes/comment.php" onsubmit="return validateTextArea(\'brother-comment-form\');">
                 <input type="hidden" id="wh" name="wh" value="' . $_GET["which"] . '"/>
                 <input type="hidden" id="whid" name="whid" value="' . $_GET["id"] . '"/>
                 <label for"liked">Liked:</label>
                 <input type="checkbox" name="liked" id="liked"/>
                 <br/>
                 <label for"text">Comment:</label>
                 <textarea name="text" id="text" maxlength="1900" required>
                 </textarea>
                 <br/>
                 <input type="submit" value="Comment"/>
                 <br/>
                 </form>';
             }
            ?>
        </div>
        <?php foot(); ?>
    </body>
</html>