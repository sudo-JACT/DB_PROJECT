<?php

    include_once("./php/template.php");

    session_checker();


    if (isset($_POST['orderby'])) {

        switch ($_POST['orderby']) {

            case 'A-Z':

                $sql = "SELECT a.sale as sale, a.id as id, a.name as name, a.image_path as image_path, b.name as bname, a.price as price FROM album as a join published as p on p.album_id=a.id join band as b on b.id=p.band_id ORDER BY a.name";
                break;

            case 'Z-A':

                $sql = "SELECT a.sale as sale, a.id as id, a.name as name, a.image_path as image_path, b.name as bname, a.price as price FROM album as a join published as p on p.album_id=a.id join band as b on b.id=p.band_id ORDER BY a.name DESC";
                break;

            case 'Ascending':

                $sql = "SELECT a.sale as sale, a.id as id, a.name as name, a.image_path as image_path, b.name as bname, a.price as price FROM album as a join published as p on p.album_id=a.id join band as b on b.id=p.band_id ORDER BY a.price";
                break;
            
            case 'Discending':

                $sql = "SELECT a.sale as sale, a.id as id, a.name as name, a.image_path as image_path, b.name as bname, a.price as price FROM album as a join published as p on p.album_id=a.id join band as b on b.id=p.band_id ORDER BY a.price DESC";                break;
        }

    } else {


        $sql = "SELECT a.sale as sale, a.id as id, a.name as name, a.image_path as image_path, b.name as bname, a.price as price FROM album as a join published as p on p.album_id=a.id join band as b on b.id=p.band_id";

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

        <div class='filters_div'>

            <div class="title">
        
                <h1><?php echo "WELCOME TO " . $_SESSION['title'] . "!!!" ?></h1>

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
                        <div class='border-top'></div>
                        <button type='submit' class='btn' name='orderby' value='Ascending'><li class='filt'>Ascending Price</li></button>
                        <div class='border-top'></div>
                        <button type='submit' class='btn' name='orderby' value='Discending'><li class='filt'>Discending Price</li></button>
                    </ul>
                
                </div> 

            </form>
     
        </div>

        <form method="POST" action='/php/product_page.php'>

        <?php

            echo "<div class='card-dark album-container'>";

            $conn = connect_db();

            
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
                                    <p><small>".roundPrice($row['price'])."</small></p>
                                    <p class='card-text pricetag'> ".roundPrice(calcSale($row['price'], $row['sale']))." € </p>
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

    <?php
        footer();
    ?>

</html>
