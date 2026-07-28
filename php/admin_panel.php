<?php

    include_once("./template.php");
    session_checker();

    $ad = isadmin();

?>


<!DOCTYPE html>
<html lang="en">


    <?php

       head(false);

    ?>


    <body>

        <?php

            navbar(false);

        ?>

        <?php

            if (!$ad) {

                echo "<div class='title'>
                    <h1>403 ERROR</h1>
                </div>";


            } else {
            
                echo "LOL";

            }


        ?>
 



    </body>

    <?php

        footer();

    ?>

</html>

