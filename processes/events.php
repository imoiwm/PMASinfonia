<?php
require("../containers/events.php");
require_once("../private/defined.php");
$conn = false;
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<ROOT>";
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
       echo $ev->xmlInfo();
   }
   $stmt->closeCursor();
} catch(PDOException $e) {
    $conn = true;
  echo "<ERROR>Connection failed: Sorry, we could not connect with the server.
   Try again in a few hours.</ERROR>" /*. $e->getMessage()*/;
   http_response_code(500);
   echo "</ROOT>";
   exit();
}
if (!$conn) {
    echo "<EVENT>There are currently no upcoming events yet.</EVENT>";
}
echo "
</ROOT>";
?>