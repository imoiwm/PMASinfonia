<?php
function random_string(int $loop) {
    $stri = "";
    for (; $loop > 0; $loop--) $stri .= chr((rand(0, 1)) ? rand(48, 57) : rand(65, 90));
    return $stri;
}
if (!isset($_POST["submit"]) || !isset($_POST["user"])) {
    header("Location: ../login.php");
    exit();
}
$user=$_POST["user"];
require_once("../private/defined.php");
require_once("encrypt.php");
$conn = false;
$email = "";
$pass = random_string(rand(15, 29));
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
$message = "New Password: " . $pass;
if (strcmp($email, "No Email") == 0) {
    header("Location: login.php");
    exit();
}
if (!isset($_COOKIE["times"])) {
    setcookie("times", 1, time() + 86400, "/");
} else {
    setcookie("times", $_COOKIE["times"] + 1);
}
require_once("mail.php");
$mail->addAddress($email);
$mail->Subject = $user . ": PASSWORD CHANGED";
$mail->Body = "<p>$message</p><p>If you did not change your password, contact the sysadmin immeadiately.</p>";
$mail->AltBody = $message;
$er;
try {
    $mail->send();
    $er = "Mail Sent Successfully";
} catch (Exception $e) {
    $er = "Mailer Error: " . $mail->ErrorInfo;
}
header("Location: ../login.php");
die($er);
?>