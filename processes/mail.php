<?php
define("ADDRESS", "throwaway9134098@gmail.com");
define("PASSWORD", "1Luckaydawgs");
define("NAME", "PMASinfonia");
use PHPMailer\PHPMailer\PHPMailer;

require("../vendor/autoload.php");

$mail = new PHPMailer(true); // enable exceptions
$mail->isSMTP(); // use an smtp server
$mail->SMTPAuth = true; // set authentication to true
$mail->SMTPSecure = "tls"; // gmail requires tls encryption
$mail->Host = "smtp.gmail.com"; // set the host (for gmail addresses)
$mail->Port = 587; // use this port
$mail->Username = ADDRESS; // set the email username
$mail->Password = PASSWORD; // set the email pasword
$mail->SetFrom(ADDRESS, NAME); //Set the address and name
$mail->addReplyTo(ADDRESS, "Reply", 0); //Set the reply address
$mail->isHTML(true); //Set body to HTML
?>