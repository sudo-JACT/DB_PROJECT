<?php

    include_once("./template.php");
    session_checker();


    if (isset($_POST['bandid'])) {

        $conn = connect_db();

        $sql = "SELECT b.id as id, b.name as name, b.descr as descr, b.image_path as immg FROM band as b WHERE b.id=".$_POST['bandid']."";
        $row = $conn->query($sql)->fetch();

        $sql2 = "SELECT a.name as name, m.role as role FROM artist as a JOIN members as m ON a.id=m.artist_id WHERE m.band_id=".$row['id']." ORDER BY a.name";
        $rows = $conn->query($sql2);

        $sql3 = "SELECT a.name as name, YEAR(a.publication_date) as pd FROM album as a JOIN published p ON a.id=p.album_id WHERE p.band_id=".$row['id']." ORDER BY a.publication_date";
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

            <div class='row bg-white p-4 rounded shadow-sm band-card'>

                <div class='col-12 col-md-6 mb-4 mb-md-0'>
                    <div class0'border rounded text-center bg-light mb-3'>
                        <img class='img-fluid rounded' src='".$row['immg']."'></img>
                    </div>
                </div>

                <div class='col-12 col-md-6 d-flex flex-column'>
                    <h1 class='h3 fw-bold mb-3'>".$row['name']."</h1>


                    <div class='mb-4'>

                        <div class='row g-2 align-items-end'>


                        </div>

                    </div>

                    <div class='border-top fw-bold bg-transparent px-0 text-dark'>

                        <h2>Description</h2>

                        <p class='px-0 text-muted'>".$row['descr']."</p>

                    </div>


                    <div class='border-top fw-bold bg-transparent px-0 text-dark'>

                        <h2>Members</h2>
                        <ul>";

            if ($rows->rowCount() > 0) {

                while ($r = $rows->fetch()) {

                    echo "<li class='px-0, text-muted'>".$r['name']." (".$r['role'].")</li>";

                }

            }

            echo "</ul></div>
                <div class='border-top fw-bold bg-transparent px-0 text-dark'>
                    <h2>Discography</h2>
                    <ul>";

            if ($rows2->rowCount() > 0) {

                while ($r = $rows2->fetch()) {

                    echo "<li class='px-0, text-muted'>".$r['name']." (".$r['pd'].")</li>";

                }

            }


            echo "</ul>  </div>


                </div>


            </div>";
        
        ?>

    </body>

</html>

