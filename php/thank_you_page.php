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

        <div class='thankyou'>
       
            <div class='row bg-white p-4 rounded shadow-sm thankyou-body' id="cart-body">

                <h1>Thank you for purchasing from</h1>
                <img src="/imgs/logo/Smugglers Logo.png" >

            </div>

        </div>
    
    </body>



</html>
