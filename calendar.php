<!DOCTYPE html>
<html>
    <head>
        <title>Calendar</title>
    </head>
    <body>
        <?php
         echo   "<div class=\"events-collection\">";
         class Events extends RecursiveIteratorIterator {
            function __construct($it) {
                parent::__construct($it, self::LEAVES_ONLY);
            }
          
            function current() {
                static $times = 0;
                $which = array("event-title", "event-date", "event-location", "event-description");
                $times %= 4;
                return "<p class=\"" . $which[$times++] . "\">" . parent::current() . "</p>";
            }
          
            function beginChildren(): void {
                static $id = 1;
                echo "<div class=\"event\" id=\"event-$id\">";
                $id++;
            }
          
            function endChildren(): void {
              echo "</div>" . "\n";
            }
          }
         $server = "localhost";
         $database = "web_dev";
         $username = "prog";
         $password = "1035Fox!";
         $conn = false;
         try {
           $test = new PDO("mysql:host=$server;dbname=$database", $username, $password);
           // set the PDO error mode to exception
           $test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $stmt = $test->prepare("CALL getEvents();");
            $stmt->execute();
             
            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach(new Events(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                $conn = true;
              echo $v;
            }
         } catch(PDOException $e) {
           echo "Connection failed: " . $e->getMessage();
         }
         echo "</div>";
        ?>
    </body>
</html>