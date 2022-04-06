# PMASinfonia
Website for the UGA chapter of Phi Mu Alpha Sinfonia. Alternatively, completed as a Web Development (CSCI4300) project.
In order for email to work, Download PHPMailer, Using Composer (composer require phpmailer/phpmailer).
The login has an reset password that changes the password to a random string and sends it via email.
Use updateBrotherEmail() or plain MYSQL code to change the email to the desired email address.
Update php.ini and sendmail.ini to the specified values in their respective change files.
The img directory must be exactly the same in the htdocs page (php needs images in relative path).