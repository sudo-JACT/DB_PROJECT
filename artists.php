<?php
    $servername = "mariadb";
    $username = "root";
    $password = "root";
    $dbname = "proddb";

    $title = "DiscPeffog"; 



?>

<!DOCTYPE html>
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

 
        <div class="title">
            <h1>ARTISTS</h1>
        </div>


        <?php

            try {
        
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        
            } catch(PDOException $e) {
        
                echo "Connection failed: " . $e->getMessage();
        
            }

            echo "<div class='card-dark'>";

            try {

                $sql = "SELECT name, image_path FROM band";
             
                $result = $conn->query($sql);
               
                if ($result->rowCount() > 0) {

                
                    while($row = $result->fetch()) {
                        
                        echo "<div class='album'>"; 
                        echo "<figure class='figure border-noen'>";
                        echo "<img src='".$row['image_path']."' class='figure-img img-fluid rounded' alt=".$row['name'].">";
                        echo "<figcaption class='figure-caption text-center text-neon-w'>".$row['name']."</figcaption>";
                        echo "</figure>";
                        echo "</div>";
                
                    }
                
                    unset($result);
                    
                }else {
            
                    echo "No records found.";
            
                }
                
            } catch(PDOException $e) {
             
                echo "Error: " . $e->getMessage();
            
            }

            echo "</div>";


        ?>

    </body>

</html>
