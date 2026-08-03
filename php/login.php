<?php

    include_once("./template.php");


    if (session_checker()) {

        header('Location: '.'/'); 

        //manda alla home 


    } else {

        head(false);

        navbar();

        echo "<div class='login-background'>";

        echo "<form class='mb-3 row' action='./access.php' method='post'>

                    <div class='mb-3'>
                    <label for='Name' class='form-label'>Name</label>
                    <input type='text' class='form-control-login' name='name' value='name'>
                </div>
                
                <div class='mb-3'>
                    <label for='Email' class='form-label'>Email</label>
                    <input type='email' class='form-control-login' name='email' value='email@example.com'>
                </div>
                
                <div class='mb-3'>
                    <label for='Password' class='form-label'>Password</label>
                    <input type='password' class='form-control-login' name='passwd' placeholder='password'>
                </div>
                
                <div class='mb-3'>
                    <button type='submit' class='btn btn-neon mb-3'>Confirm identity</button>
                </div>

                </form>";
        
            //chiede tutto



    }
    
    echo "</div>";

?>
