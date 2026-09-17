<?php

    include_once("./template.php"); // inclusione template.php
    session_checker(); // controllo sessione


    if (isset($_POST['bandid'])) { // check invio parametro "bandid" tramite POST

        $conn = connect_db(); // apertura connessione database

        // query che recupera le info della band (ID, nome, descrizione, percorso immagine)
        $sql = "SELECT b.id as id, b.name as name, b.descr as descr, b.image_path as immg FROM band as b WHERE b.id=".$_POST['bandid']."";
        // dopo la query si recupera la prima riga del risultato, fetch() restituisce array contenente i dati della band
        $row = $conn->query($sql)->fetch();

        // recupero artisti che fanno parte della band.
        // artist contiene info sugli artisti
        // members è la tabella che collega artisti con le band
        // risultati ordinati alfabeticamente
        $sql2 = "SELECT a.name as name, m.role as role FROM artist as a JOIN members as m ON a.id=m.artist_id WHERE m.band_id=".$row['id']." ORDER BY a.name";
        // conserviamo il risultato perchè potrebbe contenere più righe
        $rows = $conn->query($sql2);

        // recupero album pubblicati dalla band
        $sql3 = "SELECT a.id as id, a.name as name, YEAR(a.publication_date) as pd FROM album as a JOIN published p ON a.id=p.album_id WHERE p.band_id=".$row['id']." ORDER BY a.publication_date";
        // risultato conservato nella casistica di più album
        $rows2 = $conn->query($sql3);

    } else {

        // se bandid non viene trovato l'utetne viene reindirizzato alla homepage
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

            <!-- Contenitore principale della scheda della band -->
            <div class='row bg-band-product p-4 rounded shadow-sm band-card'>

                <!-- Colonna contenente l'immagine -->
                <div class='col-md-6'>
                    <div class='text-center image-size-artist'>
                        
                        <!--
                            Mostra l'immagine della band.
                            Il percorso viene preso dal database:
                            row['immg']
                        -->
                        <img class='img-fluid-artist rounded' src='".$row['immg']."'></img>
                    </div>
                </div>

                <!-- Colonna contenente le informazioni sulla band -->
                <div class='col-12 col-md-6 d-flex flex-column'>
                    
                    <!-- Nome della band -->
                    <h1 class='font-size-band'>".$row['name']."</h1>

                    <!-- Sezione descrizione -->
                    <div class='border-top fw-bold bg-transparent px-0 text-dark'>

                        </br>
                        
                        <!-- Titolo della sezione -->
                        <div class='band-name-product'>Description</div>
                        
                        </br>

                        <!--
                            Mostra la descrizione della band.
                            Il contenuto proviene dal database.
                        -->
                        <div class='description-album-product'>".$row['descr']."</div>
                        </br>

                    </div>

                    <!-- Sezione membri della band -->
                    <div class='border-top fw-bold bg-transparent px-0 text-dark'>
                        
                        </br>
                        <!-- Titolo della sezione -->
                        <div class='band-name-product'>Members</div>
                        </br>
                        <ul>";

                        // Controlla se la query dei membri ha restituito almeno una riga
                        if ($rows->rowCount() > 0) {

                             // Recupera una riga alla volta dal risultato.
                            while ($r = $rows->fetch()) {

                                // mostra nome dell'artista e ruolo
                                echo "<li class='description-album-product'>".$r['name']." (".$r['role'].")</li>";

                            }

                        }

                        // Chiude la lista dei membri e apre il form che verrà utilizzato per selezionare un album.
                        // Il form invia i dati tramite POST alla pagina /php/product_page.php.
                        echo "<form method='POST' action='/php/product_page.php'> </ul></div>
                            
                            <!-- Sezione discografia -->
                            <div class='border-top fw-bold bg-transparent px-0 text-dark'>
                            
                            </br>
                            <!-- Titolo della sezione -->
                            <div class='band-name-product'>Discography</div>
                            </br>    
                            
                            <ul>";

                        // Controlla se esistono album associati alla band.
                        if ($rows2->rowCount() > 0) {

                            // Scorre tutti gli album trovati.
                            while ($r = $rows2->fetch()) {

                                // abbiamo un pulsante (elemento <li>) che contiene productid, id dell'album e nome + anno album
                                echo "<li class='description-album-product'><button class='btn' value='".$r['id']."' name='productid' type='submit'>".$r['name']." (".$r['pd'].")</li>";

                            }

                        }


                        echo "</ul>  </div> </form>


                </div>


            </div>";
        
        ?>

    </body>

</html>

