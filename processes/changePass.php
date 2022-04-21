<?php
set_include_path(get_include_path() . PATH_SEPARATOR . getcwd() . PATH_SEPARATOR . getcwd() . '\\processes'
 . PATH_SEPARATOR . getcwd() . '\\private' . PATH_SEPARATOR . getcwd() . '\\..\\private' . PATH_SEPARATOR . getcwd() . '\\..\\processes');
require_once("defined.php");
require_once("encrypt.php");

/*
 * Changes the password of a given user to a given password
 * Preconditions:
 * $user: should be the username of an already existing user
 * $pass: should be a password that complies with the pattern
 * Postconditions:
 * The user's password is changed to the desired password
 * Parameters:
 * string $user: the username of the brother
 * string $pass: the desired password to change to
 * Returns:
 * The email of the given brother
 */
function changePassword(string $user, string $pass): string {
    global $test; // get the database connection
    $conn = false; // if there is anything to the result set
    try {
        if ($test === null) exit();
        // set the PDO error mode to exception
        $test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $test->prepare("CALL updateBrotherPassword(:u, :p);");
        $username = htmlspecialchars($user);
        $password = htmlspecialchars(encrypt(htmlspecialchars($pass), htmlspecialchars($user)));
        // initialize variables with filtered/encrypted input
        $stmt->bindParam(":u", $username);
        $stmt->bindParam(":p", $password); // bind all required variables
        $stmt->execute();
        
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $email = ""; // set $email
        foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $it) {
            $conn = true;
            $email = $it["email"]; // set email to the user's email
        } // only goes through once
    } catch(PDOException $e) {
        $conn = true;
        echo "<h1><b>Connection failed:</b></h1>\n<p>Sorry, we could not connect with the server.
            Try again in a few hours.</p>" /*. $e->getMessage()*/;
    }
    $stmt->closeCursor(); // close cursor
    if (!$conn) {
        echo "<p>There are currently no upcoming brothers yet.</p>";
        return "";
    } // if the username is not correct, display error message and return empty string
    return $email; // return brother email
}
?>