<!DOCTYPE html>
<html lang="en">


    <?php

        include_once("./template.php");

        head(false);

    ?>

    <body>

        <?php

            navbar(false);

        ?>


        <div class="title">
            <h1>ALBUMS</h1>
        </div>

        <?php

            $conn = connect_db();


            echo "<div class='card-dark'>";

            try {

                $sql = "SELECT a.name as name, a.image_path as image_path, a.id as id, b.name as bname FROM album as a join published as p on p.album_id=a.id join band as b on b.id=p.band_id";
             
                $result = $conn->query($sql);
               
                if ($result->rowCount() > 0) {

                
                    while($row = $result->fetch()) {
                        
                        echo "<div class='album foto'>"; 
                        echo "<figure class='figure border-noen'>";
                        echo "<img src='".$row['image_path']."' class='figure-img img-fluid rounded foto' alt=".$row['name']."-".$row['id'].">";
                        echo "<figcaption class='figure-caption text-center text-neon-w'>".$row['name']."</figcaption>";
                        echo "</figure>";
                        echo "<br/>";
                        echo "<text class='text-neon'>".$row['bname']."</text>";
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
