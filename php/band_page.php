<?php

    include_once("./template.php");
    session_checker();


    if (isset($_POST['bandid'])) {

        $conn = connect_db();

        $sql = "SELECT b.id as id, b.name as name, b.descr as descr, b.image_path as immg FROM band as b WHERE b.id=".$_POST['bandid']."";
        $row = $conn->query($sql)->fetch();

        $sql2 = "SELECT a.name as name, m.role as role FROM artist as a JOIN members as m ON a.id=m.artist_id WHERE m.band_id=".$row['id']." ORDER BY a.name";
        $rows = $conn->query($sql2);

        $sql3 = "SELECT a.id as id, a.name as name, YEAR(a.publication_date) as pd FROM album as a JOIN published p ON a.id=p.album_id WHERE p.band_id=".$row['id']." ORDER BY a.publication_date";
        $rows2 = $conn->query($sql3);

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


            echo "

            <div class='row bg-band-product p-4 rounded shadow-sm band-card'>

                <div class='col-md-6'>
                    <div class='text-center image-size-artist'>
                        <img class='img-fluid-artist rounded' src='".$row['immg']."'></img>
                    </div>
                </div>

                <div class='col-12 col-md-6 d-flex flex-column'>
                    
                    <h1 class='font-size-band'>".$row['name']."</h1>


                    

                    <div class='border-top fw-bold bg-transparent px-0 text-dark'>

                        </br>
                        <div class='band-name-product'>Description</div>
                        </br>

                        
                        <div class='description-album-product'>".$row['descr']."</div>
                        </br>

                    </div>


                    <div class='border-top fw-bold bg-transparent px-0 text-dark'>
                        
                        </br>
                        <div class='band-name-product'>Members</div>
                        </br>
                        <ul>";

                        if ($rows->rowCount() > 0) {

                            while ($r = $rows->fetch()) {

                                echo "<li class='description-album-product'>".$r['name']." (".$r['role'].")</li>";

                            }

                        }

                        echo "<form method='POST' action='/php/product_page.php'> </ul></div>
                            <div class='border-top fw-bold bg-transparent px-0 text-dark'>
                            
                            </br>
                            <div class='band-name-product'>Discography</div>
                            </br>    
                            
                            <ul>";

                        if ($rows2->rowCount() > 0) {

                            while ($r = $rows2->fetch()) {

                                echo "<li class='description-album-product'><button class='btn' value='".$r['id']."' name='productid' type='submit'>".$r['name']." (".$r['pd'].")</li>";

                            }

                        }


                        echo "</ul>  </div> </form>


                </div>


            </div>";
        
        ?>

    </body>

</html>

