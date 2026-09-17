<?php

    include_once("./template.php"); // importa il file template.php

    session_checker(); // check sulla sessione


    if (isset($_POST['orderby'])) { // controlla se il parametro orderby è stato inviato tramite richiesta POST

        // In base al valore ricevuto viene scelta una diversa query SQL per ordinare gli album.
        switch ($_POST['orderby']) {

            // ordinamento alfabetico crescente
            case 'A-Z':

                $sql = "SELECT a.sale as sale, a.id as id, a.name as name, a.image_path as image_path, b.name as bname, a.price as price FROM album as a join published as p on p.album_id=a.id join band as b on b.id=p.band_id ORDER BY a.name";
                break;

            // ordinamento alfabetico decrescente
            case 'Z-A':

                $sql = "SELECT a.sale as sale, a.id as id, a.name as name, a.image_path as image_path, b.name as bname, a.price as price FROM album as a join published as p on p.album_id=a.id join band as b on b.id=p.band_id ORDER BY a.name DESC";
                break;

            // Ordinamento per prezzo crescente. Viene utilizzato il prezzo dopo l'applicazione dello sconto.
            case 'Ascending':

                $sql = "SELECT a.sale as sale, a.id as id, a.name as name, a.image_path as image_path, b.name as bname, a.price as price FROM album as a join published as p on p.album_id=a.id join band as b on b.id=p.band_id ORDER BY a.price-(a.price * (a.sale/100))";
                break;
            
            // Ordinamento per prezzo decrescente. Anche in questo caso viene considerato il prezzo scontato.
            case 'Discending':

                $sql = "SELECT a.sale as sale, a.id as id, a.name as name, a.image_path as image_path, b.name as bname, a.price as price FROM album as a join published as p on p.album_id=a.id join band as b on b.id=p.band_id ORDER BY a.price-(a.price * (a.sale/100)) DESC";
                break;
        }

    } else {

        // Se non è stato selezionato alcun ordinamento,
        // viene eseguita una query senza ORDER BY.
        // Gli album verranno quindi restituiti nell'ordine
        // predefinito dal database.
        $sql = "SELECT a.sale as sale, a.id as id, a.name as name, a.image_path as image_path, b.name as bname, a.price as price FROM album as a join published as p on p.album_id=a.id join band as b on b.id=p.band_id";

    }

?>

<html lang="en">

    <?php

       
       head(false);

    ?>

    <body>
        
        <?php

            navbar();

        ?>

        <!--
            Contenitore della sezione dei filtri.
            Qui l'utente può scegliere il tipo di ordinamento.
        -->
        <div class='filters_div'>

            <!-- Titolo della pagina -->
            <div class="title">
                <h1>ALBUMS</h1>
            </div>


            <!--
                Form utilizzato per inviare la scelta
                dell'ordinamento tramite POST.
            -->
            <form method='POST' class='filters'>

                <div class="btn btn-group">
                    
                    <!--
                        Pulsante che apre il menu a tendina.
                        Bootstrap viene utilizzato per gestire il dropdown.
                    -->
                    <button class="filter-btn btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Order By
                    </button>
                    
                    <!-- Menu contenente le diverse modalità di ordinamento -->
                    <ul class="dropdown-menu filter">
                        <!-- Sotto gli ordinamenti indicati dalla parte all'inizio del codice in questo file -->
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

        <!--
            Secondo form della pagina.
            Viene utilizzato per inviare l'ID dell'album
            alla pagina product_page.php quando l'utente
            clicca sulla copertina di un album.
        -->
        <form method="POST" action='/php/product_page.php'>

        <?php

            // Crea il contenitore che conterrà tutte le card degli album.
            echo "<div class='card-dark album-container'>";

            // Apre una connessione al database.
            $conn = connect_db();

            // Controlla se la connessione al database è fallita.
            if ($conn === null) {

                echo "<h1>Connection Error</h1>";

            } else {

                // Prova a eseguire le operazioni sul database.
                try {

                    // Esegue la query SQL precedentemente costruita.
                    $result = $conn->query($sql);
                
                    // Controlla se la query ha restituito almeno un risultato.
                    if ($result->rowCount() > 0) {

                        // Recupera una riga alla volta dal risultato.
                        while($row = $result->fetch()) {
                            
                            /*
                                Crea una card HTML per ogni album.

                                $row['id']          -> ID dell'album
                                $row['image_path']  -> percorso dell'immagine
                                $row['name']        -> nome dell'album
                                $row['bname']       -> nome della band
                                $row['price']       -> prezzo originale
                                $row['sale']        -> percentuale di sconto
                            */
                            echo "<div class='card card-dark'>
                                   
                                    <!--
                                        L'immagine è contenuta in un pulsante.
                                        Quando l'utente clicca sull'immagine,
                                        viene inviato l'ID dell'album.
                                    -->
                                    <button class='btn' type='submit' value='".$row['id']."' name='productid'><img src='".$row['image_path']."' class='card-img-top' alt='".$row['name']."'>
                                    </button>
                                    <div class='card-body'>
                                        <!-- Nome della band -->
                                        <p class='card-text text-neon-w'>".$row['bname']."</p>
                                        <!-- Nome dell'album -->
                                        <p class='card-text text-neon'>".$row['name']."</p>";

                            // Controlla se l'album è in offerta.
                            if ($row['sale'] != 0) {

                                    /*
                                    Se esiste uno sconto:

                                    - viene mostrato il prezzo originale
                                      barrato in rosso;
                                    - viene mostrato il prezzo scontato.

                                    calcSale() calcola il prezzo dopo lo sconto.
                                    roundPrice() probabilmente formatta il prezzo
                                    con il numero corretto di decimali.
                                    */
                                    echo "
                                        <p class='card-text pricetag'><del class='salee' style='color: red !important;'>".roundPrice($row['price'])." €</del> ".roundPrice(calcSale($row['price'], $row['sale']))." € </p>
                                    </div>
                                </div>";

                            } else {

                                    /*
                                    Se non c'è nessuno sconto,
                                    viene mostrato semplicemente
                                    il prezzo dell'album.
                                    */
                                    echo "
                                        <p class='card-text pricetag'> ".roundPrice(calcSale($row['price'], $row['sale']))." € </p>
                                    </div>
                                </div>";

                            }
                        
                        }
            
                        // Libera la variabile contenente il risultato della query.
                        unset($result);
                        
                    }else {
                
                        // Se la query non restituisce album, viene mostrato un messaggio.
                        echo "<h1>No records found.</h1>";
                
                    }
                    
                } catch(PDOException $e) {
                
                    // Se si verifica un errore PDO durante L'esecuzione della query, viene mostrato il messaggio di errore.
                    echo "<h1>Error: " . $e->getMessage() . "</h1>";
            
                }

            }

            echo "</div>";


        ?>

        </form>
    </body>

    <?php
        // Inserisce il footer della pagina.
        footer();
    ?>

</html>
