<?php

    include_once("./php/template.php");

    if (!session_checker()) {

        session_init();

    }

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

            echo "<div class='card-dark'>";

            $conn = connect_db();

            
            if ($conn === null) {

                echo "<h1>Connection Error</h1>";

            } else {


                try {

                    $sql = "SELECT a.name as name, a.image_path as image_path, b.name as bname FROM album as a join published as p on p.album_id=a.id join band as b on b.id=p.band_id";
                
                    $result = $conn->query($sql);
                
                    if ($result->rowCount() > 0) {

                    
                        while($row = $result->fetch()) {
                            
                            echo "<div class='album'>"; 
                            echo "<figure class='figure border-noen'>";
                            echo "<img src='".$row['image_path']."' class='figure-img img-fluid rounded' alt=".$row['name'].">";
                            echo "<figcaption class='figure-caption text-center text-neon-w'>".$row['name']."</figcaption>";
                            echo "</figure>";
                            echo "<br/>";
                            echo "<text class='text-neon'>".$row['bname']."</text>";
                            echo "</div>";
                    
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
