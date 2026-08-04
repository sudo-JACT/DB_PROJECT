<?php

    include_once("./template.php");
    session_checker();

?>


<html leng='en'>

    <?php

        head(false)

    ?>



    <body>
    
    
        <?php

            navbar();

        ?>
    
    
         <div class='card-login'>

            <div class="title">
        
                <h1>TO ACCESS THE CART PLEASE LOGIN FIRST</h1>

            </div>

        </div>


        <div class='card-login'>
            <form action='/php/login.php'>
                <button class='btn btn-neon' type='submit'>LOGIN</button>
            </form>
        </div>

    </body>












</html>
