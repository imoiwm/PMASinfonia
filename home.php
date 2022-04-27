<!DOCTYPE html>
<?php require_once("template.php"); ?>
<html lang="en-US">
    <head>
        <title>Home</title>
        <?php headInfo("Home Page", "Home, Home Page", []); ?>
    </head>
    <body>
        <?php head(0); ?>
        <div class="d-block w-50" style="margin-left: auto; margin-right: auto">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="img/uploads/buckets.png" alt="First slide">
                    </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="img/uploads/fullfrat.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/uploads/musicale.png" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" data-bs-target="#carouselExampleIndicators" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" data-bs-target="#carouselExampleIndicators" type="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
        <br>
        <br>
        <br>
        <?php foot(); ?>
    </body>
</html>