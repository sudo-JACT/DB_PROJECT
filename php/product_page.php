<?php

    include_once("./template.php");
    session_checker();


    if (isset($_POST['productid'])) {

        $conn = connect_db();

        $sql = "SELECT a.name as name, a.image_path as image_path, a.id as id, b.name as bname, a.price as price, a.descr as descr FROM album as a join published as p on p.album_id=a.id join band as b on b.id=p.band_id WHERE a.id='".$_POST['productid']."'";

        $row = $conn->query($sql)->fetch();

        $sql2 = "SELECT i.num as num, s.name as name FROM song as s JOIN ispartof as i ON s.id=i.song_id WHERE i.album_id=".$row['id']." ORDER BY i.num";

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


            echo "

            <div class='row bg-white p-4 rounded shadow-sm'>

                <div class='col-12 col-md-6 mb-4 mb-md-0'>
                    <div class0'border rounded text-center bg-light mb-3'>
                        <img class='img-fluid rounded' src='".$row['image_path']."'></img>
                    </div>
                </div>

                <div class='col-12 col-md-6 d-flex flex-column'>
                    <h2 class='h5 text-uppercase text-muted fw-bold mb-1'>".$row['bname']."</h2>
                    <h1 class='h3 fw-bold mb-3'>".$row['name']."</h1>

                    <div class='mb-4 border-bottom pb-3'>
                        <span class='h2 fw-bold text-dark'>€ ".$row['price']."</span>
                        <p class='text-muted small mb-0 mt-1'><i class='bi bi-check-circle text-success'></i> Tasse incluse. Spese di spedizione calcolate al checkout.</p>
                    </div>
                    

                    <div class='mb-4'>

                        <div class='row g-2 align-items-end'>

                            <div class='col-3'>

                                <label for='quantity' class='form-label small fw-bold'>Quantity</label>
                                <input type='number' step='1', name='quantity', id='quantity'>

                            </div>

                            <div class='col-9'>

                                <button class='btn btn-dark w-100 py-2 fw-bold text-uppercase d-flex justify-content-center align-items-center gap-2'><i class='bi bi-cart-plus fs-5'></i>Add to the cart</button>

                            </div>

                        </div>

                    </div>

                    <div class='border-top fw-bold bg-transparent px-0 text-dark'>

                        <h2>Description</h2>

                        <p class='px-0 text-muted'>".$row['descr']."</p>

                    </div>


                    <div class='border-top fw-bold bg-transparent px-0 text-dark'>

                        <h2>Tracklist</h2>";

            if ($rows->rowCount() > 0) {

                while ($r = $rows->fetch()) {

                    if ($r['num'] <= 9) {

                        echo "<p class='px-0, text-muted'>0".$r['num'].". ".$r['name']."</p>";

                    } else {

                        echo "<p class='px-0, text-muted'>".$r['num'].". ".$r['name']."</p>";

                    }

                }

            }


            echo "  </div>


                </div>


            </div>";
        
        ?>

    </body>

</html>

