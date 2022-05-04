## PMASinfonia
__Website for the UGA chapter of Phi Mu Alpha Sinfonia. Alternatively, completed as a Web Development (CSCI4300) project.__

---------------------------------

In order for email to work, Download PHPMailer, Using Composer (composer require phpmailer/phpmailer).
 - The login has an reset password that changes the password to a random string and sends it via email.
 - Use updateBrotherEmail() or plain MySQL code to change the email to the desired email address.
 - Update php.ini and sendmail.ini to the specified values in the change files 'phpChange.txt' and 'sendmailChange.txt,' respectively.
 - The img directory must be exactly the same in the htdocs page (php needs images in relative path).

To "register" and add your own user account to the database:
1. create a file 'defined.php' and put it in a new folder 'private'
    - end result will be 'private/defined.php'
2. copy either 'private/temp.txt' or this (same contents) and set the desired login info in $USERNAME and $PASSWORD:
```
<?php
$SERVER_NAME = "localhost";
$DATABASE_NAME = "web_dev";
$USERNAME =  "your_username";
$PASSWORD = "your_password";
$test = null;
try {
    $test = new PDO("mysql:host=" . $SERVER_NAME . ";dbname=" . $DATABASE_NAME, $USERNAME, $PASSWORD);
} catch (PDOException $e) {
    echo "<h1><b>Connection failed:</b></h1>\n<p>Sorry, we could not connect with the server.
            Try again in a few hours.</p>" /*. $e->getMessage()*/;
}
$SERVER_NAME = "";
$DATABASE_NAME = "";
$USERNAME =  "";
$PASSWORD = "";
?>
```
