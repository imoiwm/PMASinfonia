<?php

/*
 * The header of the page.
 * Preconditions: none
 * Postconditions: header is printed to the screen.
 * Parameters:
 * int $whichActive the number to denote which item is active
 *     from 0-6, if outside of 0-6, no item is labeled active.
 * Returns: none.
 */
function head(int $whichActive = -1): void {
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    } // if session has not already started, start it
    $which = ["", "", "", "", "", "", ""]; // initialize array of empties
    if ($whichActive >= 0 && $whichActive < 7) {
        $which[$whichActive] .= "active";
    } // if $whichActive is in acceptable range, make the corresponding string "active"
    $se = isset($_SESSION["User"]) && isset($_SESSION["Pass"]); // see if user is logged in
    $link = (!$se) ? "login.php" : "brother.php"; // link for changing item
    $name = (!$se) ? "Login" : "Profile"; // name for changing item
    $signOut = (!$se) ? '' : '<li class="nav-item">
                        <a class="nav-link" href="processes/signout.php">Sign Out</a>
                        </li>'; // the sign out item
    echo '<!--Bootstrap navbar w/ One item highlighted-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <span class="pma">ΦMA - </span>
                        <span class="dawgs">ΕΛ</span>
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
                        ' . $signOut . '
                    </ul>
                    </div>
                </div>
            </nav>';
}

/*
 * The footer of the page.
 * Preconditions: none
 * Postconditions: footer is printed to the screen.
 * Parameters: none
 * Returns: none.
 */
function foot(): void {
    echo '<footer class="footer mt-auto py-3 bg-light">
            <div class="container">
                <span class="text-muted">Copyright © 2020 Phi Mu Alpha Sinfonia Fraternity of America | All Rights Reserved</span>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';
}

/*
 * A css file for a page.
 * Preconditions: $fileName must match file in styles/
 * Postconditions: css file is added.
 * Parameters:
 * string $fileName the filename (not including extension or path).
 * Returns: none.
 */
function cssFile(string $fileName = "global"): void {
    echo '<link rel="stylesheet" type="text/css" href="styles/' . $fileName . '.css">';
}

/*
 * A javascript file for a page.
 * Preconditions: $fileName must match file in the current directory
 * Postconditions: javascript file is added.
 * Parameters:
 * string $fileName the filename (not including extension or path).
 * Returns: none.
 */
function jsFile(string $fileName = "global"): void {
    echo '<script src="' . $fileName . '.js"></script>';
}

/*
 * A favicon file for a page.
 * Preconditions: none
 * Postconditions: favicon image is added.
 * Parameters: none.
 * Returns: none.
 */
function favicon(): void {
    echo '<link rel="icon" type="image/x-icon" href="img/favicon.ico">';
}

/*
 * Various meta tags are added to a page.
 * Preconditions: none.
 * Postconditions: meta tags added.
 * Parameters:
 * string $description the description for the description section.
 * string $keywords the keywords for the keywords section
 * Returns: none.
 */
function meta(string $description = "Phi Mu Alpha Sinfonia Page", 
    string $keywords = "PMA Sinfonia UGA, UGA Chapter, Phi Mu Alpha Sinfonia UGA"): void {
    echo '<meta charset="UTF-8">
        <meta name="description" content="' . $description . '">
        <meta name="keywords" content="' . $keywords . '">
        <meta name="author" content="Justin Moon, Ivan Mo, Colin Jinks, Nathan Jacobi, Will Gautreaux">
        <meta name="viewport" content="width=device-width, initial-scale=1">';
}

/*
 * Adds the general tags for the head section.
 * Preconditions: none.
 * Postconditions: tags added.
 * Parameters:
 * string $description the description for the description section.
 * string $keywords the keywords for the keywords section.
 * array $cssFiles the filenames for external css files to be added.
 * Returns: none.
 */
function headInfo(string $description, string $keywords, array $cssFiles = []): void {
    meta("Phi Mu Alpha Sinfonia UGA Chapter $description Page", "PMA Sinfonia UGA, UGA Chapter, Phi Mu Alpha Sinfonia UGA, " . $keywords);
    cssFile("bscolors"); // bootstrap with colors changed
    cssFile("bsstyle"); // some styles
    favicon(); // favicon for page
    cssFile("normalize"); // normalize css file for browsers
    cssFile(); // global css file
    foreach($cssFiles as $file) {
        cssFile($file);
    } // for each string in the array, add it
}
?>
