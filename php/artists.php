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

        <form method='POST' action="/php/band_page.php">

        <?php

            $conn = connect_db();


            echo "<div class='card-dark album-container'>";

            try {

                $sql = "SELECT id, name, image_path FROM band";
             
                $result = $conn->query($sql);
               
                if ($result->rowCount() > 0) {

                
                    while($row = $result->fetch()) {
                        
                        echo "<div class='album foto'>
                              <figure class='figure border-neon'>
                              <button tipe='submit' class='btn' value='".$row['id']."' name='bandid'><img src='".$row['image_path']."' class='figure-img foto_band' alt=".$row['name']."></button>
                              </br></br>
                              <figcaption class='figure-caption text-center text-neon-w'>".$row['name']."</figcaption>
                              </figure>
                              </div>";
                
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
        
        </form>
    </body>

</html>
