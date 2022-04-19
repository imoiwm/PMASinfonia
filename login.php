<!DOCTYPE html>
<?php 
if (isset($_SESSION["User"]) && isset($_SESSION["Pass"])) {
    header("Location: brother.php");
    exit();
}
require_once("template.php")
?>
<html lang="en-US">
    <head>
        <title>Login</title>
        <?php 
        headInfo("Login", "Login, Log in, Logon, Log on", ["login"]);
        jsFile("validate");
        ?>
    </head>
    <body>
        <?php head(); ?>
        <img id="bigLogo" src="img/logo_solo_white.png" />
        <form id="signInForm" method="post" action="brother.php" onsubmit="return validate('signInForm');">
            <label id="userLabel" for="user">Username:</label>
            <input type="text" id="user" name="user" maxlength="255" pattern="[0-9A-Za-z]{4,255}" autofocus required><label for="user" class="desc">Must be 15-30 characters in length</label><br/>
            <label id="passLabel" for="pass">Password:</label>
            <input type="password" id="pass" name="pass" minlength="15" maxlength="30" pattern="[0-9A-Za-z]{15,30}" required><label for="pass" class="desc">Must be 15-30 characters in length</label><br/>
            <input type="submit" id="submit-button" class="submit-button" name="submit" value="Submit">
        </form>
        <p>Can't Remember Your Password?</p>
        <form id="passwordRandom" method="post" action="processes/email.php" onsubmit="return validate('passwordRandom');">
            <label for="usern">Username: </label>
            <input type="text" id="usern" name="user" maxlength="255" pattern="[0-9A-Za-z]{4,255}" required> |
            <input type="submit" id="submit-button2" class="submit-button" name="submit" value="Reset Password">
        </form>
        <?php foot(); ?>
    </body>
</html>