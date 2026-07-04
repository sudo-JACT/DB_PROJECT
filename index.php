<?php
    $servername = "mariadb";
    $username = "root";
    $password = "root";
    $dbname = "proddb";


    try {
 
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
        echo "Connected successfully";
 
    } catch(PDOException $e) {
 
        echo "Connection failed: " . $e->getMessage();
 
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <link rel="icon" type="image/x-icon" href="./imgs/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        <script src="./js/script.js"></script>
        <title><?php echo $title; ?></title>

    </head>

    <body>
    
        <div>

            <h1>

                <?php 
                
                    echo " "; 
                
                ?>

            </h1>

        </div>

        <a href="./test.php", target="_blank">ES 2b</a>


    </body>

</html>
