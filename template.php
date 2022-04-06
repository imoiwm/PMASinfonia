<?php

function head(): void {
    echo '<header>
            <a href="">
                <img class="logo" src="img/logo.png">
            </a>
            <nav >
                <ul class="nav-list">
                    <!--The format is very important to enure there are no spaces between items-->
                    <li class="nav-list"><a href="" class="nav-buttons"> Merch </a></li
                    ><li class="nav-list"><a href="" class="nav-buttons"> Brothers </a></li
                    ><li class="nav-list"><a href="" class="nav-buttons"> Calendar </a></li
                    ><li class="nav-list"><a href="" class="nav-buttons"> Contact </a></li
                    ><li class="nav-list"><a href="" class="nav-buttons"> Log in </a></li
                    ><li class="nav-list"><a href="" class="nav-buttons"> History </a></li
                    ><li class="nav-list"><a href="" class="nav-buttons"> About </a></li>
                </ul>
            </nav>
        </header>';
}

function foot(): void {
    echo '<footer>
    <p id="copyright">Copyright © 2020 Phi Mu Alpha Sinfonia Fraternity of America | All Rights Reserved</p>
    </footer>';
}

function cssFile(): void {
    echo '<link rel="stylesheet" type="text/css" href="test.css">';
}
?>