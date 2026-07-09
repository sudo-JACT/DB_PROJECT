<html lang="en">

    <?php

       include_once("./template.php");
       head();

    ?>

    
    <body>

        <?php

            include_once("./template.php");
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

