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

            http_response_code(403);

            echo "<div class='title'>";
            echo "<h1>403 ERROR</h1>";
            echo "</div>";


        ?>


    </body>

</html>

