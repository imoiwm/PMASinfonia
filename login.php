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
        <?php headInfo("Login", "Login, Log in, Logon, Log on", []); ?>
    </head>
    <body>
        <?php head(); ?>
        <form method="post" action="brother.php">
            <label for="user">Username:</label>
            <input type="text" id="user" name="user" maxlength="255" autofocus required><label for="user" class="desc">Must be 15-30 characters in length</label><br/>
            <label for="pass">Password:</label>
            <input type="password" id="pass" name="pass" minlength="15" maxlength="30" required><label for="pass" class="desc">Must be 15-30 characters in length</label><br/>
            <input type="submit" id="submit-button" name="submit" value="Submit">
        </form>
        <p>Can't Remember Your Password:</p>
        <form method="post" action="processes/email.php">
            <label for="usern">Username: </label>
            <input type="text" id="usern" name="user" maxlength="255" required> |
            <input type="submit" id="submit-button2" name="submit" value="Reset Password">
        </form>
        <?php foot(); ?>
    </body>
</html>