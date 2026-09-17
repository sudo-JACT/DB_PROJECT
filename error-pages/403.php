// inclusione del file template.php
<?php

    include_once("../php/template.php");
    session_checker(); // controllo della sessione se valida e se presenti permessi
?>

<html lang="en">

    <?php

       head(false);

    ?>

    
    <body>

        <?php

            navbar();

        ?>



        <?php

            http_response_code(403); // imposta codice risposta 403

            echo "<div class='title'>";
            echo "<h1>403 ERROR</h1>";
            echo "</div>";


        ?>


    </body>

</html>

