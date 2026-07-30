<?php

    include_once("./template.php");
    session_checker();
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

            http_response_code(404);

            echo "<div class='title'>";
            echo "<h1>404</h1>";
            echo "</div>";


        ?>


    </body>

</html>

