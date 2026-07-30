<?php

    include_once("./template.php");
    session_checker();


    if (!isadmin()) {

        header('Location: /php/403.php'); 

    }

    $result = null;
    $err = null;

    $selected = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sel'])) {
        
        if ($_POST['sel'] != '') {
        
            $selected = (int)$_POST['sel'];

        }



    }



    if (isset($_POST['flag'])) {

        $filename = '';

        if (isset($_FILES['imga']['name'])) {

            $name = basename($_FILES['imga']['name']);

            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            
            $filename = "../imgs/albums/" . $name;
        
        }



            switch ($_POST['flag']) {

                case 'album':


                    if (!file_exists($filename) && getimagesize($_FILES['imga']['tmp_name']) && $_FILES['imga']['size'] <= 2000000 && !($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'webp')) {

                        if(!move_uploaded_file($_FILES['imga']['tmp_name'], $filename)) {

                            $err = "Impossibile caricare l'imagine";

                        }else {

                            $conn = connect_db();

                            $sql = "INSERT INTO album (name, publication_date, image_path, descr, linky) VALUES ('".$_POST['name']."', '".$_POST['pubdate']."', '".$filename."', '".$_POST['desc']."', '".$_POST['link']."')";
                            $conn->query($sql);

                            $sql = "INSERT INTO published (band_id, album_id) VALUES ((SELECT id FROM band where name='".$_POST['bandn']."'), (SELECT id FROM album where name='".$_POST['name']."'))";
                            $conn->query($sql);

                        }

                    }

                    break;


                case 'song':

                    $conn = connect_db();

                    $sql = "INSERT INTO song (name, duration, descr, linky) VALUES ('".$_POST['name']."', '".$_POST['duration']."', '".$_POST['desc']."', '".$_POST['link']."')";
                    $conn->query($sql);

                    $sql = "INSERT INTO ispartof (album_id, song_id, num) VALUES ((SELECT id FROM album WHERE name='".$_POST['albumn']."'), (SELECT id FROM song WHERE name='".$_POST['name']."'), '".$_POST['trac']."')";
                    $conn->query($sql);

                    break;


                default:
                    # code...
                    break;
        }


        header('Location: ' . $_SERVER['PHP_SELF'] . '');
        exit;

    }

    

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['query'])) {

        $query = $_POST['query'];

        try {
        
            $conn = connect_db();

            $stmt = $conn->query($query);
            
            if ($stmt === false) {

                $err = $conn->errorInfo()[2] ?? 'Error';

            }else {
    
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            }

        } catch (Throwable $e) {
            $err = $e->getMessage();
        }
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

        ?>


        <?php

            echo "<form method='POST' class='mb-3 card-dark'>

                <select class='form-select form-select-lg mb-3 card-dark text-neon' aria-label='Query' name='sel'>
                   
                    <option disabled selected value=''>Choose yuor option</option> 
                    <option value='0'>Free Query</option>
                    <option value='1'>Add Album</option>
                    <option value='2'>Add Song</option>
                    <option value='3'>Add Band</option>
                    <option value='4'>Add Artist</option>
                    <option value='5'>Add User</option>
                    <option value='6'>Add Genre</option>

                </select>

                <button type='submit' class='btn btn-neon mb-3'>Esegui</button>


            </form>";

        ?>


        <?php if ($selected === 0) :?>

            <form method="POST" class="mb-3">

                <div class="mb-3 card-dark">
                    <label for="query" class="form-label text-neon">Query</label>
                    <textarea class="form-control" id="query" name="query" rows="10"><?= htmlspecialchars($_POST['query'] ?? '') ?></textarea>
                </div>

                <button type="submit" class="btn btn-neon mb-3">Esegui</button>
            </form>

        <?php endif; ?>


        <?php if ($selected === 1) :?>

            <form method="POST" class="mb-3" enctype="multipart/form-data">

                <div class='mb-3 card-dark'>
                    <label for='Name' class='form-label text-neon ll'>Name</label>
                    <input type='text' class='form-control' name='name' value='name'>
                
                    <label for='pubdate' class='form-label text-neon ll'>Publication Date</label>
                    <input type='date' class='form-control' name='pubdate'>
           
                    <label for='imga' class='form-label text-neon ll'>Image</label>
                    <input type='file' class='form-control' name='imga' accept='image/*'>

                    <label for='desc' class='form-label text-neon ll'>Description</label>
                    <input type='text' class='form-control' name='desc'>

                    <label for='link' class='form-label text-neon ll'>Link</label>
                    <input type='url' class='form-control' name='link'>

                    <label for='bandn' class='form-label text-neon ll'>Band Name</label>
                    <input type='text' class='form-control' name='bandn'>


                    <input type='hidden' name='flag' value='album'>

                </div>
                


                <button type='submit' class='btn btn-neon mb-3'>Esegui</button>
            </form>

        <?php endif; ?>



        <?php if ($selected === 2) :?>

            <form method="POST" class="mb-3" enctype="multipart/form-data">

                <div class='mb-3 card-dark'>
                    <label for='Name' class='form-label text-neon ll'>Name</label>
                    <input type='text' class='form-control' name='name' value='name'>
                
                    <label for='pubdate' class='form-label text-neon ll'>Duration (in seconds)</label>
                    <input type='number' step='0.01' class='form-control' name='duration'>
           
                    <label for='desc' class='form-label text-neon ll'>Description</label>
                    <input type='text' class='form-control' name='desc'>

                    <label for='link' class='form-label text-neon ll'>Link</label>
                    <input type='url' class='form-control' name='link'>

                    <label for='albumn' class='form-label text-neon ll'>Album Name</label>
                    <input type='text' class='form-control' name='albumn'>

                    <label for='trac' class='form-label text-neon ll'>Trac Number</label>
                    <input type='number' step="1" class='form-control' name='trac'>


                    <input type='hidden' name='flag' value='song'>

                </div>
                


                <button type='submit' class='btn btn-neon mb-3'>Esegui</button>
            </form>

        <?php endif; ?>



        <?php if ($selected === 3) :?>

            <form method="POST" class="mb-3" enctype="multipart/form-data">

                <div class='mb-3 card-dark'>
                    <label for='Name' class='form-label text-neon ll'>Name</label>
                    <input type='text' class='form-control' name='name' value='name'>
                
                    <label for='pubdate' class='form-label text-neon ll'>Creation Date</label>
                    <input type='date' class='form-control' name='pubdate'>
           
                    <label for='imga' class='form-label text-neon ll'>Image</label>
                    <input type='file' class='form-control' name='imga' accept='image/*'>

                    <label for='desc' class='form-label text-neon ll'>Bio</label>
                    <input type='text' class='form-control' name='desc'>

                    <label for='link' class='form-label text-neon ll'>Link</label>
                    <input type='url' class='form-control' name='link'>


                    <input type='hidden' name='flag' value='band'>

                </div>
                


                <button type='submit' class='btn btn-neon mb-3'>Esegui</button>
            </form>

        <?php endif; ?>



        <br/>



        <?php
            if ($err) {
                echo "<div class='card-dark'>
                    <p style='color:red'>".htmlspecialchars($err)."</p>
                </div>";
            }
        ?>


        <?php 
            if ($result !== null) {

                if (count($result) > 0) {

                    echo "<div class='mb-3 card-dark'>";
                    echo "<table class='table table-bordered card-dark text-neon table-dark table-striped'><thead><tr>";

                    foreach (array_keys($result[0]) as $col) {

                        echo "<th class='card-dark text-neon'>" . htmlspecialchars($col) . "</th>";
    
                    }
    
                    echo "</tr></thead><tbody class='card-dark'>";
    
                    foreach ($result as $riga) {
                
                        echo "<tr class='card-dark text-neon'>";
                
                        foreach ($riga as $val) {

                            echo "<td class='card-dark'>" . htmlspecialchars($val ?? '') . "</td>";
                    
                        }
    
                        echo "</tr>";
                    
                    }
        
                    echo "</tbody></table>";
        
                } else {
                
                    echo "<p class='text-neon'>Query eseguita con successo.</p>";
        
                }
        
                echo "</div>";
            }
        ?>


    </body>

    <?php

        footer();

    ?>

</html>

