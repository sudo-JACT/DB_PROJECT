<?php

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
