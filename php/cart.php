<?php

    include_once("./template.php");

    if (!session_checker()) {

        header('Location: '.'/');

    }

?>

<html lang="en">

    <?php

       
       head(false);

    ?>

    <body>
        
        <?php

            navbar();

        ?>

    </body>

</html>
