<?php

    include_once("./template.php");
    session_checker();


    if (isset($_POST['productid'])) {

        $conn = connect_db();

        $sql = "SELECT a.name as name, a.image_path as image_path, a.id as id, b.name as bname, a.price as price, a.descr as descr FROM album as a join published as p on p.album_id=a.id join band as b on b.id=p.band_id WHERE a.id='".$_POST['productid']."'";

        $row = $conn->query($sql)->fetch();

        $sql2 = "SELECT i.num as num, s.name as name FROM song as s JOIN ispartof as i ON s.id=i.song_id WHERE i.album_id=".$_POST['productid']." ORDER BY i.num";

        $rows = $conn->query($sql2);

    } else {

        header('Location: '.'/'); 

    }

?>


<!DOCTYPE html>
<html lang="en">


    <?php


        head(false);

    ?>

    <body>

        <?php

            navbar();


            echo "<form method='POST' action='/php/cart.php'>

            <div class='row p-4 bg-album-product rounded shadow-sm'>

                <div class='col-md-6'>
                    <div class='text-center album-image'>
                        <img class='img-fluid rounded' src='".$row['image_path']."'></img>
                    </div>
                </div>

                <div class='col-12 col-md-6 d-flex flex-column'>
                    <h2 class='band-name-product'>".$row['bname']."</h2>
                    <h1 class='album-name-product'>".$row['name']."</h1>

                    <div class='mb-4 border-bottom'>
                        <span class='pricetag-product'>€ ".roundPrice($row['price'])."</span>
                        <p class='pricetag-tax'>incl. VAT, excl. Shipping</p>
                    </div>
                    

                    <div class='mb-4'>

                        <div class='row d-flex'>

                            <div class='col'>

                                <input type='number' step='1', name='quantity', id='quantity' value='1' class='number-item'>
                                <input type='hidden' name='id' value='".$row['id']."'>

                            </div>

                            <div class='col-9'>

                                <button class='add-to-cart-button-product btn btn-dark fw-bold text-uppercase justify-content-center' type='submit'>Add to cart</button>

                            </div>

                        </div>

                    </div>

                    <div class='border-top fw-bold bg-transparent px-0 text-dark'>

                        </br>
                        <div class='band-name-product'>Description</div>
                        </br>

                        
                        <div class='description-album-product'>".$row['descr']."</div>
                        </br>

                    </div>


                    <div class='border-top fw-bold bg-transparent px-0 text-dark'>

                        </br>
                        <div class='band-name-product'>Tracklist</div>
                        </br>
                    ";


            if ($rows->rowCount() > 0) {

                while ($r = $rows->fetch()) {

                    if ($r['num'] <= 9) {

                        echo "<p class='px-0 description-album-product'>0".$r['num'].". ".$r['name']."</p>";

                    } else {

                        echo "<p class='px-0 description-album-product'>".$r['num'].". ".$r['name']."</p>";

                    }

                }

            }


            echo "  </div>


                </div>


            </div></form>";
        
        ?>

    </body>

</html>

