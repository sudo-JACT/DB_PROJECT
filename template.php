<?php

function head() {

    $servername = "mariadb";
    $username = "root";
    $password = "root";
    $dbname = "proddb";
    
    $title = "DiscPeffog"; 


    echo "<head>";

    echo "<meta charset='UTF-8'>";
    echo "<link rel='icon' type='image/x-icon' href='./imgs/favicon.ico'>";
    echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB' crossorigin='anonymous'>";
    echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js' integrity='sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI' crossorigin='anonymous'></script>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<link rel='stylesheet' href='./css/style.css'>";
    echo "<script src='./js/script.js'></script>";
    echo "<title><?php echo $title ?></title>";

    echo "</head>";


}

function navbar() {

    echo "<ul class='nav justify-content-end'>";
  
    echo "<li class='nav-item'>";
    echo "<a class='nav-link active text-neon-w' aria-current='page' href='/'>HOME</a>";
    echo "</li>";

    echo "<li class='nav-item'>";
    echo "<a class='nav-link text-neon-w' href='./albums.php'>ALBUMS</a>";
    echo "</li>";

    echo "<li class='nav-item'>";
    echo "<a class='nav-link text-neon-w' href='./artists.php'>ARTISTS</a>";
    echo "</li>";

    echo "</ul>";

}

?>
