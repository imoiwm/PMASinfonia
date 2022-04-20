<?php
set_include_path(get_include_path() . PATH_SEPARATOR . getcwd() . PATH_SEPARATOR . getcwd() . '\\processes' . PATH_SEPARATOR . getcwd() . '\\private');
require_once("defined.php");
require_once("encrypt.php");
function changePassword(string $user, string $pass): string {
    global $test;
    $conn = false;
    try {
        if ($test === null) exit();
        // set the PDO error mode to exception
        $test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $test->prepare("CALL updateBrotherPassword(:u, :p);");
        $stmt->bindParam(":u", $username);
        $stmt->bindParam(":p", $password);
        $username = htmlspecialchars($user);
        $password = htmlspecialchars(encrypt(htmlspecialchars($pass), htmlspecialchars($user)));
        $stmt->execute();
        
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $email = "";
        foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $it) {
            $conn = true;
            $email = $it["email"];
        }
    } catch(PDOException $e) {
        $conn = true;
        echo "<h1><b>Connection failed:</b></h1>\n<p>Sorry, we could not connect with the server.
            Try again in a few hours.</p>" /*. $e->getMessage()*/;
    }
    $stmt->closeCursor();
    if (!$conn) {
        echo "<p>There are currently no upcoming brothers yet.</p>";
        return "";
    }
    return $email;
}
?>