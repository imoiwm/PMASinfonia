<?php

function head(int $whichActive = -1): void {
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    $which = ["", "", "", "", "", "", ""];
    if ($whichActive >= 0 && $whichActive < 7) {
        $which[$whichActive] .= "active";
    }
    $se = isset($_SESSION["User"]) && isset($_SESSION["Pass"]);
    $link = (!$se) ? "login.php" : "brother.php";
    $name = (!$se) ? "Login" : "Profile";
    echo '<!--Bootstrap navbar w/ History highlighted-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <span class="pma">ΦMA</span>
                        <span class="dawgs">Dawgs</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link ' . $which[0] . '" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link ' . $which[1] . '" href="'. $link . '">' . $name . '</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link ' . $which[2] . '" href="listBrothers.php">Brothers</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link ' . $which[3] . '" href="calendar.php">Calendar</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link ' . $which[4] . '" href="history.php">History</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link ' . $which[5] . '" href="merchPage.php">Merchandise</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link ' . $which[6] . '" href="contact.php">Contact Us</a>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>';
}

function foot(): void {
    echo '<footer class="footer mt-auto py-3 bg-light">
            <div class="container">
                <span class="text-muted">Copyright © 2020 Phi Mu Alpha Sinfonia Fraternity of America | All Rights Reserved</span>
            </div>
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
        <meta name="viewport" content="width=device-width, initial-scale=1">';
}

function headInfo(string $description, string $keywords, array $cssFiles = []): void {
    meta("Phi Mu Alpha Sinfonia UGA Chapter $description Page", "PMA Sinfonia UGA, UGA Chapter, Phi Mu Alpha Sinfonia UGA, " . $keywords);
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/bsstyle.css">';
    favicon();
    cssFile("normalize");
    cssFile();
    foreach($cssFiles as $file) {
        cssFile($file);
    }
}
?>