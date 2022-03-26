<?php
/*if (!isset($_POST["submit"]) || !isset($_POST["user"])) {
    header("Location: login.html");
    exit();
}
$user=$_POST["user"];*/
$user = "Qa12";
require_once("private/defined.php");
require_once("encrypt.php");
$conn = false;
$email = "";
try {
    if ($test === null) exit();
    // set the PDO error mode to exception
    $test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $test->prepare("CALL updateBrotherPassword(:u, :p);");
    $stmt->bindParam(":u", $username);
    $stmt->bindParam(":p", $password);
    $username = htmlspecialchars($user);
    $password = htmlspecialchars(encrypt("123EasyStreet!Awesome", $user));
    $stmt->execute();
    
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
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
}
$message = "New Password: " . "123EasyStreet!Awesome";
if (strcmp($email, "No Email") == 0) {
    header("Location: login.html");
    exit();
}
require_once("mail.php");
$mail->addAddress($email);
$mail->Subject = $user . ": PASSWORD CHANGED";
$mail->Body = "<p>$message</p><p>If you did not change your password, contact [] immeadiately.</p>";
$mail->AltBody = $message;
$er;
try {
    $mail->send();
    $er = "Mail Sent Successfully";
} catch (Exception $e) {
    $er = "Mailer Error: " . $mail->ErrorInfo;
}
header("Location: login.html");
die($er);
?>