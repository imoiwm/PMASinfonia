<?php
define("ADDRESS", "throwaway9134098@gmail.com");
define("PASSWORD", "1Luckaydawgs");
define("NAME", "PMASinfonia");
use PHPMailer\PHPMailer\PHPMailer;

require("../vendor/autoload.php");

$mail = new PHPMailer(true); // enable exceptions
$mail->Host = "ssl://smtp.gmail.com:465"; // set the host (for gmail addresses)
$mail->Username = ADDRESS; // set the email username
$mail->Password = PASSWORD; // set the email pasword
$mail->SetFrom(ADDRESS, NAME, 0); //Set the address and name
$mail->addReplyTo(ADDRESS, "Reply"); //Set the reply address
$mail->isHTML(true); //Set body to HTML
?>