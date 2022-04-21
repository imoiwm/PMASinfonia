<?php
/*
 * Gives a random string of uppercase letters and digits
 * Preconditions: none
 * Postconditions: none
 * Parameters:
 * int $loop: how many characters for the string to have
 * Returns:
 * The randomized string
 */
function random_string(int $loop) {
    $stri = ""; // initialize
    for (; $loop > 0; $loop--) $stri .= chr((rand(0, 1)) ? rand(48, 57) : rand(65, 90));
    // add a character while for every loop cycle
    return $stri; // return stri
}
if (!isset($_POST["submit"]) || !isset($_POST["user"])) {
    header("Location: ../login.php");
    exit();
} // if post data is not initialized, go back to the login page
$user=$_POST["user"]; // move to own variable
require_once("changePass.php");
$pass = random_string(rand(15, 29)); // make pass random
$email = changePassword($user, $pass); // make the password random
$message = "New Password: " . $pass; // the new password message
if (strcmp($email, "No Email") == 0) {
    header("Location: login.php");
    exit();
} // this is impossible, but for legacy data
if (!isset($_COOKIE["times"])) {
    setcookie("times", 1, time() + 86400, "/");
} else {
    setcookie("times", $_COOKIE["times"] + 1);
} // if cookie is already set, increment it and add time, else initialize the cookie
require_once("mail.php"); // set up mailing
$mail->addAddress($email); // set reciever to $email
$mail->Subject = $user . ": PASSWORD CHANGED"; // make subject
$mail->Body = "<p>$message</p><p>If you did not change your password, contact the sysadmin immeadiately.</p>";
$mail->AltBody = $message; // make html body and alternative body
$er = ""; // set $er
try {
    $mail->send();
    $er = "Mail Sent Successfully"; // try to send the mail
} catch (Exception $e) {
    $er = "Mailer Error: " . $mail->ErrorInfo;
} // if mail was not sent, update the $er message
header("Location: ../login.php"); // redirect to the login page (refresh)
die($er); // use $er to document error
?>