<?php
    $servername = "mariadb";
    $username = "root";
    $password = "root";
    $dbname = "proddb";


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
        <title>DiscPeffo</title>

    </head>

    <body>

        <?php

            try {
        
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        
            } catch(PDOException $e) {
        
                echo "Connection failed: " . $e->getMessage();
        
            }

            try {
            
                $sql = "SELECT name, image_path FROM album";
             
                $result = $conn->query($sql);
               
                if ($result->rowCount() > 0) {
                
                
                    while($row = $result->fetch()) {
                
                        echo "<figure class='figure'>";
                        echo "<img src='".$row['image_path']."' class='figure-img img-fluid rounded' alt=".$row['name']."style='width: 500px; height: 500px; object-fit: cover;'>";
                        echo "<figcaption class='figure-caption text-center'>".$row['name']."</figcaption>";
                        echo "</figure>";

                
                    }
                
                    echo "</table>";
                    unset($result);
                
                }else {
            
                    echo "No records found.";
            
                }
                
            } catch(PDOException $e) {
             
                echo "Error: " . $e->getMessage();
            
            }

        ?>

    </body>

</html>
