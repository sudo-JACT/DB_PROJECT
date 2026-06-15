<?php 

    $title="TEST";
    $string="Sono Mario Sturniolo mi piace la pasta";

    $test = @mysqli_connect('test_373851', 'root', 'root', 'test_373851');

    $lol = mysqli_query($test, "select nome from STUDENTE where matricola=221221");
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
                
                    echo $string;
                    echo " "; 
                    echo strlen($string);
                
                ?>

            </h1>

        </div>

        <a href="./test.php", target="_blank">ES 2b</a>

        <?php echo $lol ?>

    </body>

</html>
