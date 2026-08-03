<?php

    include_once("./template.php");
    session_checker();

    if (isset($_POST['name'])) {

        $conn = connect_db();

        $sql = "SELECT a.id as id, a.name as name, a.image_path as image_path, b.name as bname, a.price as price FROM album as a join published as p on p.album_id=a.id join band as b on b.id=p.band_id WHERE a.name LIKE '%".$_POST['name']."%' OR b.name LIKE '%".$_POST['name']."%'";
        $row = $conn->query($sql);

    }

?>


<html lang="en">

    <?php

        head(false);

    ?>


    <body>

        <?php

            navbar();

        ?>

        <form method="POST" action='/php/product_page.php'>

        <?php

            echo "<div class='card-dark album-container'>";

            
            if ($conn === null) {

                echo "<h1>Connection Error</h1>";

            } else {


                try {

                    $result = $conn->query($sql);
                
                    if ($result->rowCount() > 0) {

                    
                        while($row = $result->fetch()) {
                            
                        echo "<div class='card card-dark'>
                                <button class='btn' type='submit' value='".$row['id']."' name='productid'><img src='".$row['image_path']."' class='card-img-top' alt='".$row['name']."'>
                                </button>
                                <div class='card-body'>
                                    <p class='card-text text-neon-w'>".$row['bname']."</p>
                                    <p class='card-text text-neon'>".$row['name']."</p>
                                    <p class='card-text pricetag'> ".roundPrice($row['price'])." € </p>
                                </div>
                            </div>";
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

        </form>



    </body>





</html>
