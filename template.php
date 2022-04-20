<?php

function head(): void {
    echo '<header id="global-head">
            <a href="about.php">
                <img class="logo" src="img/logo.png" alt="Phi Mu Alpha Sinfonia Logo">
            </a>
            <nav >
                <ul class="nav-list" id="ul-nav-list">
                    <span id="global-ul-text">&#9776;</span>
                    <!--The format is very important to enure there are no spaces between items-->
                    <li class="nav-list"><a href="merchPage.php" class="nav-buttons"> Merch </a></li
                    ><li class="nav-list"><a href="listOfBrothers.php" class="nav-buttons"> Brothers </a></li
                    ><li class="nav-list"><a href="calendar.php" class="nav-buttons"> Calendar </a></li
                    ><li class="nav-list"><a href="contact.php" class="nav-buttons"> Contact </a></li
                    ><li class="nav-list"><a href="login.php" class="nav-buttons"> Log in </a></li
                    ><li class="nav-list"><a href="history.php" class="nav-buttons"> History </a></li
                    ><li class="nav-list"><a href="about.php" class="nav-buttons"> About </a></li>
                </ul>
            </nav>
        </header>';
}

function foot(): void {
    echo '<script>detect();</script>
    <br>
    <br>
    <br>
    <footer id="global-footer">
    <p id="copyright">Copyright © 2020 Phi Mu Alpha Sinfonia Fraternity of America | All Rights Reserved</p>
    </footer>';
}

function cssFile(string $fileName = "global"): void {
    echo '<link rel="stylesheet" type="text/css" href="styles/' . $fileName . '.css">';
}

function jsFile(string $fileName = "global"): void {
    echo '<script src="' . $fileName . '.js"></script>';
}

function favicon(): void {
    echo '<link rel="icon" type="image/x-icon" href="img/favicon.ico">';
}

function meta(string $description = "Phi Mu Alpha Sinfonia Page", 
    string $keywords = "PMA Sinfonia UGA, UGA Chapter, Phi Mu Alpha Sinfonia UGA"): void {
    echo '<meta charset="UTF-8">
        <meta name="description" content="' . $description . '">
        <meta name="keywords" content="' . $keywords . '">
        <meta name="author" content="Justin Moon, Ivan Mo, Colin Jinks, Nathan Jacobi, Will Gautreaux">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">';
}

function headInfo(string $description, string $keywords, array $cssFiles = []): void {
    meta("Phi Mu Alpha Sinfonia UGA Chapter $description Page", "PMA Sinfonia UGA, UGA Chapter, Phi Mu Alpha Sinfonia UGA, " . $keywords);
    favicon();
    cssFile("normalize");
    cssFile();
    foreach($cssFiles as $file) {
        cssFile($file);
    }
    jsFile("detect");
}
?>