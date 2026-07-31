<?php

    include_once("./template.php");
    session_checker();

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

 
        <div class="title">
            <h1>BAND</h1>
        </div>


        <?php

            $conn = connect_db();


            echo "<div class='card-dark album-container'>";

            try {

                $sql = "SELECT name, image_path FROM band";
             
                $result = $conn->query($sql);
               
                if ($result->rowCount() > 0) {

                
                    while($row = $result->fetch()) {
                        
                        echo "<div class='album foto'>"; 
                        echo "<figure class='figure border-neon'>";
                        echo "<img src='".$row['image_path']."' class='figure-img img-fluid rounded' alt=".$row['name'].">";
                        echo "</br></br>";
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
