<?php

    include_once("./php/template.php");

    session_checker()

?>

<html lang="en">

    <?php

       
       head(true);

    ?>

    <body>
        
        <?php

            navbar(true);

        ?>
    
        <div class="title">
            <h1><?php echo $_SESSION['title'] ?></h1>
        </div>


        <?php

            echo "<div class='card-dark album-container'>";

            $conn = connect_db();

            
            if ($conn === null) {

                echo "<h1>Connection Error</h1>";

            } else {


                try {

                    $sql = "SELECT a.name as name, a.image_path as image_path, b.name as bname, a.price as price FROM album as a join published as p on p.album_id=a.id join band as b on b.id=p.band_id";
                
                    $result = $conn->query($sql);
                
                    if ($result->rowCount() > 0) {

                    
                        while($row = $result->fetch()) {
                            
                        /*echo "<div class='card card-dark' style='width: 18rem;'>*/
                        echo "<div class='card card-dark'>
                                <img src='".$row['image_path']."' class='card-img-top' alt='".$row['name']."'>
                                <div class='card-body'>
                                    <p class='card-text text-neon-w'>".$row['bname']."</p>
                                    <p class='card-text text-neon'>".$row['name']."</p>
                                    <p class='card-text pricetag'> ".$row['price']." € </p>
                                </div>
                            </div>";
                        /*
                            echo "<div class='album foto'>"; 
                            echo "<figure class='figure border-neon'>";
                            echo "<img src='".$row['image_path']."' class='figure-img img-fluid rounded' alt=".$row['name'].">";
                            // nome album
                            echo "<figcaption class='figure-caption text-center text-neon-w'>".$row['bname']."</figcaption>";
                            echo "</figure>";
                            echo "<br/>";
                            // nome della band
                            echo "<text class='text-neon'>".$row['name']."</text>";
                            echo "</div>";
                        */
                        }
                    
                        unset($result);
                        
                    }else {
                
                        echo "<h1>No records found.</h1>";
                
                    }
                    
                } catch(PDOException $e) {
                
                    echo "<h1>Error: " . $e->getMessage() . "</h1>";
            
                }

            }

            echo "</div>";


        ?>

    </body>

    <?php
        footer();
    ?>

</html>
