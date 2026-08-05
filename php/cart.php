<?php

    include_once("./template.php");

    if (!session_checker()) {

        header('Location: '.'/php/please_login.php');

    }

    $conn = connect_db();


    if (isset($_POST['quantity']) && isset($_POST['id'])) {

        $sql = "SELECT c.quantity as q FROM cart as c WHERE c.user_id=".$_SESSION['id']." AND c.album_id=".$_POST['id']."";
        $r = $conn->query($sql);

        if ($r->rowCount() > 0) {

            $r = $r->fetch();

            $sql = "UPDATE cart SET quantity=".($r['q'] + $_POST['quantity'])." WHERE user_id=".$_SESSION['id']." AND album_id=".$_POST['id']."";

        } else {

            $sql = "INSERT INTO cart (user_id, album_id, quantity) VALUES (".$_SESSION['id'].", ".$_POST['id'].", ".$_POST['quantity'].")";
    
        }

        $conn->query($sql);

        header('Location: ' . $_SERVER['PHP_SELF'] . '');
        exit;
    }


    if (isset($_POST['b']) && !isset($_POST['btn'])) {

        $nowtime = $conn->query("select CURRENT_TIMESTAMP AS tm;")->fetch();

        $sql = "SELECT a.id as id, a.name as name, a.price as price, b.name as bname, a.image_path as im, c.quantity as q FROM album as a JOIN cart as c ON c.album_id=a.id JOIN published as p ON p.album_id=a.id JOIN band as b ON b.id=p.band_id WHERE c.user_id=".$_SESSION['id']."";
        $row = $conn->query($sql);

        if ($row->rowCount() > 0) {

            while ($r = $row->fetch()) {

                $sql = "INSERT INTO sale (user_id, album_id, quantity, dat) VALUES (".$_SESSION['id'].", ".$r['id'].", ".$r['q'].", '".$nowtime['tm']."')";
                $conn->query($sql);

            }
            
            $sql = "DELETE FROM cart WHERE user_id=".$_SESSION['id']."";
            $conn->query($sql);
        }

        header('Location: ' . '/php/thank_you_page.php' . '');
        exit;
    
    }

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

    $tot = 0;

    $sql = "SELECT a.sale as sale, a.id as id, a.name as name, a.price as price, b.name as bname, a.image_path as im, c.quantity as q FROM album as a JOIN cart as c ON c.album_id=a.id JOIN published as p ON p.album_id=a.id JOIN band as b ON b.id=p.band_id WHERE c.user_id=".$_SESSION['id']."";
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

        <form method='POST'>
        <div class="cart">

            <div class='row bg-white p-4 rounded shadow-sm cart-body' id="cart-body">

                <div class='card mb-3' style='max-width: 720px; max-height: fit-content; border: 0px'>


            <?php

                if ($row->rowCount() > 0) {

                    while ($r = $row->fetch()) {

                        echo "<form  method='POST'><div class='row g-0 cart-card-body'>


                                        <div class='col-md-4'>
                                            <img src='".$r['im']."' class='img-fluid rounded-start cart-card-img' alt='".$r['name']."'>
                                        </div>
                                    
                                        <div class='col-md-8'>
                            
                                            <div class='card-body'>
                                
                                                <p class='card-text'><strong><small>".$r['bname']."</small></strong></p>
                                                <p class='card-text'>".$r['name']."</p>";

                            if ($r['sale'] != 0) {
                
                                    echo "<p class='card-text'><del class='salee' style='color: red !important;'>".roundPrice(($r['price'] * $r['q']))." €</del> ".roundPrice((calcSale($r['price'], $r['sale']) * $r['q']))." € </p>";

                            } else {

                                    echo "<p class='card-text'> ".roundPrice((calcSale($r['price'], $r['sale'])) * $r['q'])." € </p>";

                            }

                                                

                            echo "                    <button type='submit' class='cart-button btn' value='m' name='btn'>-</button>
    
                                                    <p class='cart-p'>".$r['q']."</p>

                                                <button type='submit' class='cart-button btn' value='p' name='btn'>+</button>
                    
                                                <input type='hidden' name='flag' value='".$r['id']."'>

                                            </div>
                                
                                        </div>
                
                                    </div></form>"; 

                       $tot += (int)$r['q'] * calcSale($r['price'], $r['sale']); 

                    }

                }

            ?>
                </div>

                <div>

                    <?php

                        echo "<button type='submit' class='btn border buy' value='buy' name='b'>Buy • ".roundPrice($tot)." €</button>";

                    ?>
     
               </div>

        </div>


        </form>
    </body>

</html>
