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
require_once("changePassword.php");
$pass = random_string(rand(15, 29));
changePassword($user, $pass);
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