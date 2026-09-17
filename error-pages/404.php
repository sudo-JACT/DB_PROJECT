<?php
    include_once("../php/template.php");
    session_checker();
?>

<html lang="en">

    <?php head(false); ?>

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        .error-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>

    <body>
      
        <?php navbar(); ?>

        <div class="error-container">
      
            <div class="title">
      
                <?php

                    http_response_code(404);
                    echo "<h1>404 ERROR</h1>";
                ?>
      
            </div>
      
        </div>
    
    </body>

</html>
