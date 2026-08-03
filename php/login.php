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

            echo "<div class='login-background'>";

            echo "<form class='mb-3 row card-login' action='./access.php' method='post'>

                        <div class='mb-3'>
                        <label for='Name' class='form-label'>Name</label>
                        <input type='text' class='form-control-login' name='name' placeholder='name'>
                    </div>
                    
                    <div class='mb-3'>
                        <label for='Email' class='form-label'>Email</label>
                        <input type='email' class='form-control-login' name='email' placeholder='email@example.com'>
                    </div>
                    
                    <div class='mb-3'>
                        <label for='Password' class='form-label'>Password</label>
                        <input type='password' class='form-control-login' name='passwd' placeholder='password'>
                    </div>
                    
                    <div class='mb-3'>
                        <button type='submit' class='btn btn-neon mb-3'>Login</button>
                    </div>

                    </form>
                    
                    </div>";
            
                //chiede tutto

    

        ?>

    </body>

    <?php

        footer();

    ?>

</html>