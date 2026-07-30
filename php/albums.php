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

            navbar();

        ?>


        <div class="title">
            <h1>ALBUMS</h1>
        </div>

        <?php

            $conn = connect_db();


            echo "<div class='card-dark album-container'>";

            try {

                $sql = "SELECT a.name as name, a.image_path as image_path, a.id as id, b.name as bname FROM album as a join published as p on p.album_id=a.id join band as b on b.id=p.band_id";
             
                $result = $conn->query($sql);
               
                if ($result->rowCount() > 0) {

                
                    while($row = $result->fetch()) {
                    
                        echo "<div class='card card-dark' style='width: 18rem;'>
                                <img src='".$row['image_path']."' class='card-img-top' alt='".$row['name']."-".$row['id']."'>
                                <div class='card-body'>
                                    <p class='card-text text-neon-w'>".$row['bname']."</p>
                                    <p class='card-text text-neon'>".$row['name']."</p>
                                </div>
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

    </body>

</html>
