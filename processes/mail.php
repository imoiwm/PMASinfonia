<?php
define("ADDRESS", "throwaway9134098@gmail.com");
define("NAME", "Justin Moon");
use PHPMailer\PHPMailer\PHPMailer;

require("vendor/autoload.php");

//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//From email address and name
$mail->SetFrom(ADDRESS, NAME, 0);


//Address to which recipient will reply
$mail->addReplyTo(ADDRESS, "Reply");


//Send HTML or Plain Text email
$mail->isHTML(true);
?>