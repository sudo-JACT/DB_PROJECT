<?php
    $servername = "mariadb";
    $username = "root";
    $password = "root";
    $dbname = "proddb";

    $title = "DiscPeffog"; 



?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <link rel="icon" type="image/x-icon" href="./imgs/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        <script src="./js/script.js"></script>
        <title><?php echo $title ?></title>


    </head>

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
