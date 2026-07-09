<?php

    include_once("./template.php");


    if (!session_checker()) {

        session_init();

        head(false);

        echo "<div class='card-dark'>";



        if (cookie_checker()) {

            echo "<form class='mb-3 row' action='./access.php' method='post'>
    
                <div class='mb-3'>
                    <label for='Password' class='form-label'>Password</label>
                    <input type='password' class='form-control' id='passwd' name='passwd' placeholder='password'>
                </div>
                
                <div class='mb-3'>
                    <button type='submit' class='btn btn-neon mb-3'>Confirm identity</button>
                </div>

                </form>";



            //chiede solo passwd

        } else {

            echo "<form class='mb-3 row' action='./access.php' method='post'>

                    <div class='mb-3'>
                    <label for='Name' class='form-label'>Name</label>
                    <input type='text' class='form-control' name='name' value='name'>
                </div>
                
                <div class='mb-3'>
                    <label for='Email' class='form-label'>Email</label>
                    <input type='email' class='form-control' name='email' value='email@example.com'>
                </div>
                
                <div class='mb-3'>
                    <label for='Password' class='form-label'>Password</label>
                    <input type='password' class='form-control' name='passwd' placeholder='password'>
                </div>
                
                <div class='mb-3'>
                    <button type='submit' class='btn btn-neon mb-3'>Confirm identity</button>
                </div>

                </form>";
        
            //chiede tutto

        }

    } else {

        header('Location: '.'/'); 

        //manda alla home 

    }
    
    echo "</div>";

?>
