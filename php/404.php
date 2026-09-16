<?php

    include_once("./template.php"); 
    session_checker(); // controllo sessione
?>

// inclusione di head, navbar e codice errore
<html lang="en">

    <?php

       head(false);

    ?>

    
    <body>

        <?php

            navbar();

        ?>



        <?php

            http_response_code(404); // http

            echo "<div class='title'>"; // messaggio di errore all'interno della pagina
            echo "<h1>404</h1>";
            echo "</div>";


        ?>


    </body>

</html>

