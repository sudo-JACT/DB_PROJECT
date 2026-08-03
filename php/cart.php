<?php

    include_once("./template.php");

    if (!session_checker()) {

        header('Location: '.'/php/login.php');

    }

    $conn = connect_db();


    if (isset($_POST['flag'])) {


        if ($_POST['btn'] === 'p') {


            $sql = "SELECT a.id as id, a.name as name, a.price as price, b.name as bname, a.image_path as im, c.quantity as q FROM album as a JOIN cart as c ON c.album_id=a.id JOIN published as p ON p.album_id=a.id JOIN band as b ON b.id=p.band_id WHERE c.user_id=".$_SESSION['id']." AND c.album_id=".$_POST['flag']."";
            $row = $conn->query($sql)->fetch();

            $sql = "UPDATE cart SET quantity=".($row['q'] + 1)." WHERE user_id=".$_SESSION['id']." AND album_id=".$_POST['flag']."";
            $conn->query($sql);

        } else {

            $sql = "SELECT a.id as id, a.name as name, a.price as price, b.name as bname, a.image_path as im, c.quantity as q FROM album as a JOIN cart as c ON c.album_id=a.id JOIN published as p ON p.album_id=a.id JOIN band as b ON b.id=p.band_id WHERE c.user_id=".$_SESSION['id']." AND c.album_id=".$_POST['flag']."";
            $row = $conn->query($sql)->fetch();

            if ($row['q'] == 1) {

                $sql = "DELETE FROM cart WHERE user_id=".$_SESSION['id']." AND album_id=".$_POST['flag']."";

            } else {

                $sql = "UPDATE cart SET quantity=".($row['q'] - 1)." WHERE user_id=".$_SESSION['id']." AND album_id=".$_POST['flag']."";

            }

            $conn->query($sql);

        }


        header('Location: ' . $_SERVER['PHP_SELF'] . '');
        exit;

    }



    $sql = "SELECT a.id as id, a.name as name, a.price as price, b.name as bname, a.image_path as im, c.quantity as q FROM album as a JOIN cart as c ON c.album_id=a.id JOIN published as p ON p.album_id=a.id JOIN band as b ON b.id=p.band_id WHERE c.user_id=".$_SESSION['id']."";
    $row = $conn->query($sql);

?>

<html lang="en">

    <?php

       
       head(false);

    ?>

    <body>
        
        <?php

            navbar();

        ?>

        <div class="cart">

            <div class='row bg-white p-4 rounded shadow-sm cart-body' id="cart-body">

                <div class='card mb-3' style='max-width: 720px; max-height: fit-content; border: 0px'>


            <?php

                if ($row->rowCount() > 0) {

                    while ($r = $row->fetch()) {

                        echo "<form method='POST'><div class='row g-0 cart-card-body'>


                                        <div class='col-md-4'>
                                            <img src='".$r['im']."' class='img-fluid rounded-start cart-card-img' alt='".$r['name']."'>
                                        </div>
                                    
                                        <div class='col-md-8'>
                            
                                            <div class='card-body'>
                                
                                                <p class='card-text'><strong><small>".$r['bname']."</small></strong></p>
                                                <p class='card-text'>".$r['name']."</p>
                                                <p class='card-text'><small class='text-body-secondary'>".roundPrice((int)$r['q'] * $r['price'])." €</small></p>

                                                <button type='submit' class='cart-button btn' value='m' name='btn'>-</button>
    
                                                    <p class='cart-p'>".$r['q']."</p>

                                                <button type='submit' class='cart-button btn' value='p' name='btn'>+</button>
                    
                                                <input type='hidden' name='flag' value='".$r['id']."'>

                                            </div>
                                
                                        </div>
                
                                    </div></form>"; 
                

                    }

                }

            ?>
                </div>
            </div>

        </div>

    </body>

</html>
