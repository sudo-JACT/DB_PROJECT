<?php

    include_once("./template.php");
    session_checker();


    if (isset($_POST['orderby'])) {

        switch ($_POST['orderby']) {

            case 'A-Z':

                $sql = "SELECT id, name, image_path FROM band ORDER BY name";
                break;

            case 'Z-A':

                $sql = "SELECT id, name, image_path FROM band ORDER BY name DESC";
                break;

        }

    } else {

        $sql = "SELECT id, name, image_path FROM band";

    }


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

        <div class='filters_div'>
 
            <div class="title">
                <h1>BAND</h1>
            </div>

            <form method='POST' class='filters'>

                <div class="btn btn-group">
                    
                    <button class="filter-btn btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Order By
                    </button>
                    
                    <ul class="dropdown-menu filter">
                        <button type='submit' class='btn' name='orderby' value='A-Z'><li class='filt'>A-Z</li></button>
                        <div class='border-top'></div>
                        <button type='submit' class='btn' name='orderby' value='Z-A'><li class='filt'>Z-A</li></button>
                    </ul>
                
                </div> 

            </form>
     
        </div>
 

        <form method='POST' action="/php/band_page.php">

        <?php

            $conn = connect_db();


            echo "<div class='card-dark album-container'>";

            try {

             
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
