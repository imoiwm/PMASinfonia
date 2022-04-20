<?php
define("ADDRESS", "throwaway9134098@gmail.com");
define("PASSWORD", "1Luckaydawgs");
define("NAME", "PMASinfomia");
use PHPMailer\PHPMailer\PHPMailer;

require("../vendor/autoload.php");

//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

$mail->Host = "ssl://smtp.gmail.com:465";
$mail->Username = ADDRESS;
$mail->Password = PASSWORD;

//From email address and name
$mail->SetFrom(ADDRESS, NAME, 0);


//Address to which recipient will reply
$mail->addReplyTo(ADDRESS, "Reply");


//Send HTML or Plain Text email
$mail->isHTML(true);
?>