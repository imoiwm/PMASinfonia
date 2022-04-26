<!DOCTYPE html>
<?php require_once("template.php"); ?>
<html lang="en-US">
    <head>
        <title>History</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/bsstyle.css">
        <?php headInfo("History", "History, Our History", ["history"]); ?>
    </head>
    <body>
        <!--Bootstrap navbar w/ History highlighted-->
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
                    <a class="nav-link" aria-current="page" href="home.html">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="bsbrothers.php">Brothers</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="bscalendar.php">Calendar</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="bshistory.php">History</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <h1>About the Chapter</h1>
        <img id="bigLogo" src="img/paper-logo.png"/>
        <div id="pane">
            <section id="right-side">
                <p class="para">
                    Lorem ipsum dolor sit amet, consectetur<br/>
                    adipiscing elit. Cras posuere elit bibendum,<br/>
                    tincidunt turpis at, varius ante. Maecenas quis odio<br/>
                    non tellus consectetur auctor quis in ipsum. Duis<br/>
                    pulvinar faucibus orci, sed vestibulum sapien<br/>
                    feugiat sed. Phasellus efficitur erat efficitur, mattis<br/>
                    ex nec, lobortis leo. Duis bibendum cursus<br/>
                    aliquam. Aliquam gravida convallis justo, et<br/>
                    ultricies est gravida non. Vivamus sodales sed<br/>
                    purus eu dictum. Cras malesuada mauris risus, id<br/>
                    tincidunt augue pharetra ut
                </p>
            </section>
            <section id="left-side">
                <p class="para">
                    Lorem ipsum dolor sit amet, consectetur<br/>
                    adipiscing elit. Cras posuere elit bibendum,<br/>
                    tincidunt turpis at, varius ante. Maecenas quis odio<br/>
                    non tellus consectetur auctor quis in ipsum. Duis<br/>
                    pulvinar faucibus orci, sed vestibulum sapien<br/>
                    feugiat sed. Phasellus efficitur erat efficitur, mattis<br/>
                    ex nec, lobortis leo. Duis bibendum cursus<br/>
                    aliquam. Aliquam gravida convallis justo, et<br/>
                    ultricies est gravida non. Vivamus sodales sed<br/>
                    purus eu dictum. Cras malesuada mauris risus, id<br/>
                    tincidunt augue pharetra ut
                </p>
            </section>
        </div>
        <footer class="footer mt-auto py-3 bg-light">
            <div class="container">
                <span class="text-muted">Copyright © 2020 Phi Mu Alpha Sinfonia Fraternity of America | All Rights Reserved</span>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>