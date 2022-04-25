<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION["User"]) && isset($_SESSION["Pass"])) {
    session_destroy();
}
header("Location: ../login.php");
exit();
?>