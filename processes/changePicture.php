<!DOCTYPE html>
<?php 
session_start();
if (!isset($_SESSION["User"]) || !isset($_SESSION["Pass"])
    || !isset($_SESSION["ID"])) {
    header("Location: login.html");
    exit();
}

$target_file = "img/uploads/" . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check === false) {
        $_SESSION["imageUpload"] = "File is not an image.";
        header("Location: brother.php");
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    $_SESSION["imageUpload"] = "Sorry, file already exists.";
    header("Location: brother.php");
}

// Check if the file name is too long
if (strlen($target_file) >= 256) {
    $_SESSION["imageUpload"] = "Sorry, file name is too long.";
    header("Location: brother.php");
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
    $_SESSION["imageUpload"] = "Sorry, your file is too large.";
        header("Location: brother.php");
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $_SESSION["imageUpload"] = "Sorry, only JPG, JPEG, & PNG files are allowed.";
    header("Location: brother.php");
}

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $_SESSION["imageUpload"] = "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
} else {
    $_SESSION["imageUpload"] = "Sorry, there was an error uploading your file.";
    header("Location: brother.php");
}

include_once("private/defined.php");

$conn = false;
try {
    if ($test === null) exit();
    // set the PDO error mode to exception
    $test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $test->prepare("CALL updateBrotherPicture(:s, :id, :u, :p);");
    $stmt->bindParam(":s", $path);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":u", $username);
    $stmt->bindParam(":p", $password);
    $path = $target_file;
    $id = (filter_var($_SESSION["ID"], FILTER_VALIDATE_INT) === 0 
            || !filter_var($_SESSION["ID"], FILTER_VALIDATE_INT) === false) ? $_SESSION["ID"] : 0;
    $username = htmlspecialchars($_SESSION["User"]);
    $password = htmlspecialchars($_SESSION["Pass"]);
    $stmt->execute();
    header("Location: brother.php");
    exit();
} catch(PDOException $e) {
    $conn = true;
    echo "<h1><b>Connection failed:</b></h1>\n<p>Sorry, we could not connect with the server.
        Try again in a few hours.</p>" /*. $e->getMessage()*/;
}
$stmt->closeCursor();
if (!$conn) {
    echo "<p>There are currently no upcoming brothers yet.</p>";
}
echo "</div>";
?>