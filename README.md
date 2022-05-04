## PMASinfonia
__Website for the UGA chapter of Phi Mu Alpha Sinfonia. Alternatively, completed as a Web Development (CSCI4300) project.__

---------------------------------
### FAQ:
 - The entry point (which file should we go to start):
   - The home.php file is the main page.
 - How to start the project?
   - Read the setup portion of the README, then start XAMPP Apache.
 - What's supposed to be the functionalities?
   - A home page featuring various photographs with the fraternity.
   - A calendar featuring events that the fraternity has set up for the community.
   - A merchandise page to show off the fraternity's merch.
   - A review page to see the comments made by the members of the fraternity for the given event/merchandise.
   - A login page to login as a brother and set your password to a random string.
   - A brother profile page to change your image, email, and bio.
   - A contact page to get in touch with members of the fraternity.
 - What browsers+operating systems has your code been tested?
   - Chrome, Firefox, and Edge for Windows 11
   - Chrome for Windows 10
 - What external libraries/frameworks did you used?
   - Bootstrap 5 (css (local, changed the primary color) and javascript (CDN)).
   - PHPMailer (installed via composer).
   - `calendar.js` was borrowed from a site (https://www.sliderrevolution.com/resources/html-calendar/) and modified to also display the location and links.
   - `moment.js`: was used in the `calendar.js` file (CDN).
   - `encrypt.php` used code taken from a site (https://levelup.gitconnected.com/encryption-in-php-cf3ca98f4287).
 - What starter code you used?
   - The examples on W3Schools for various php files.
 - The code you actually changed?
   - The javascript code for the `calendar.js` file to have location and links.
   - The php code for `encrypt.php` file to use our preferred method of encryption.

#### Hierarchy
The repository is divided between the `container`, `processes`, `sql`, `img`, and `styles` directories.
 - `container`: Has classes that store and parse data from a row of their respective database tables.
   - `brothers.php`: Contains and parses the data from the Brothers database table.
   - `comments.php`: Contains and parses the data from the Comments database table.
   - `container.php`: Abstract class that is the base for other containers.
   - `events.php`: Contains and parses the data from the Events database table.
   - `merchandise.php`: Contains and parses the data from the Merchandise database table.
 - `processes`: Has backend processes that either send data in XML format or redirect the page.
   - `changeBio.php`: Changes the bio of the given brother in the session and redirects to the brother page.
   - `changeEmail.php`: Changes the email of the given brother in the session and redirects to the brother page.
   - `changePass.php`: Changes the password of the given brother in the session and redirects to the brother page.
   - `changePicture.php`: Changes the picture of the given brother in the session and redirects to the brother page.
   - `comment.php`: Creates a new comment for the given event or merch and redirects to the review page.
   - `email.php`: Changes the given brother's password to a random string and emails the brother's email of the change. Redirects to the login page.
   - `encrypt.php`: Helper file that provides functions to encrypt and decrypt data.
   - `events.php`: Gets all the events and prints the information out in XML format.
   - `mail.php`: Helper file to initialize and configure a PHPMailer object to send (`$mail`).
   - `signout.php`: Destroys the current session and redirects to the login page.
 - `sql`: Has the SQL code needed to initialize the database.
   - `dmp`: Has the dumps of the database (newDump.sql is recommended to initialize the database).
     - `dump.sql`: a dump file that initializes the needed tables for the database.
     - `newDump.sql`: the recommended dump file to initialize the tables for the database.
   - `AttemptSQLInjection.sql`: a sql file that tests for the sql injection vunrebility.
   - `project_stored_routines.sql`: a sql file that initializes all of the needed stored procedures.
   - `project_tables.sql`: a sql file for creating the needed tables without filling the tables.
 - `img`: Has the uploaded and static images needed for the website.
   - `merch`: Has the images for the merchandise of the merchandise page.
   - `uploads`: Has the uploaded images of the brothers.
 - `styles`: Has the CSS files for the website (custom SASS file for Bootstrap included).

The php files that are not in these directories are the main pages for the website.
The javascript files are as follows:
 - `calendar.js`: Borrowed file that makes the calendar for the calendar page.
 - `getEvents.js`: Uses ajax to get the events for the calendar.
 - `validate.js`: Validates the forms that each website uses.

#### Setup

In order for email to work, Download PHPMailer, Using Composer (composer require phpmailer/phpmailer).
 - The login has an reset password that changes the password to a random string and sends it via email.
 - Use updateBrotherEmail() or plain MySQL code to change the email to the desired email address.
 - Update php.ini and sendmail.ini to the specified values in the change files 'phpChange.txt' and 'sendmailChange.txt,' respectively.
 - The img directory must be exactly the same in the htdocs page (php needs images in relative path).

To "register" and add your own user account to the database:
1. create a file 'defined.php' and put it in a new folder 'private'
    - end result will be 'private/defined.php'
2. copy either 'private/temp.txt' or this (same contents) and set the desired login info in $USERNAME and $PASSWORD:
    - P.S.: The default for the username is "root" and the default for the password is "", but check the database user credentials if you have changed them.
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
Then, in order to initialize the database:
1. Create a new database/schema called `web_dev` and set it as the current database\schema.
2. Run the `newDump.sql` file located in the `sql/dmp` directory. It is a dump file that creates the necessary tables and fills them with brothers.
3. Run the `project_stored_routines.sql` file located in the `sql` directory. It contains the stored procedures that are called on by the website.
