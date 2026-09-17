<?php

    include_once("./template.php"); // include template.php
    session_checker(); // controllo sessione


    if (isset($_POST['orderby'])) { // controllo invio parametro "orderby"

        // Analizza il valore contenuto in $_POST['orderby'].
        switch ($_POST['orderby']) {

            // Se l'utente ha scelto "A-Z",
            // recupera tutte le band ordinate alfabeticamente
            // in ordine crescente.
            case 'A-Z':

                // query che recupera id, nome e percorso immagine
                $sql = "SELECT id, name, image_path FROM band ORDER BY name";
                break;

            // Se l'utente ha scelto "Z-A",
            // recupera tutte le band in ordine alfabetico inverso.
            case 'Z-A':

                $sql = "SELECT id, name, image_path FROM band ORDER BY name DESC";
                break;

        }

    } else {

        // Se l'utente non ha selezionato nessun ordinamento,
        // vengono recuperate tutte le band senza un ordinamento
        // specifico.
        $sql = "SELECT id, name, image_path FROM band";

    }


?>



<!DOCTYPE html>
<html lang="en">


    <?php

       head(false);

    ?>


    <body>

        <?php

            navbar(false);

        ?>

        <!--
            Contenitore della sezione dedicata ai filtri.
        -->
        <div class='filters_div'>
 
            <!-- Titolo della pagina -->
            <div class="title">
                <h1 style="margin-top: 10px; margin-bottom: 10px;">BAND</h1>
            </div>

            <!--
                Form utilizzato per inviare il criterio
                di ordinamento tramite POST.
            -->
            <form method='POST' class='filters'>

                <div class="btn btn-group" style="margin-top: 10px; margin-bottom: 10px;">
                    
                    <!--
                        Pulsante che apre il menu a tendina.

                        data-bs-toggle="dropdown" è un attributo
                        di Bootstrap che permette di aprire
                        il dropdown.
                    -->
                    <button class="filter-btn btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Order By
                    </button>
                    
                    <!-- Menu a tendina con le opzioni di ordinamento -->
                    <ul class="dropdown-menu filter">
                        
                        <!--
                            - Quando viene premuto questo pulsante, il form viene inviato tramite POST.

                            - name="orderby" indica il nome del parametro inviato.

                            - value="A-Z" indica il valore che verrà inviato.
                        -->
                        <button type='submit' class='btn' name='orderby' value='A-Z'><li class='filt'>A-Z</li></button>
                        <div class='border-top'></div>

                        <!--
                            Seconda opzione: ordina le band dalla Z alla A.
                        -->
                        <button type='submit' class='btn' name='orderby' value='Z-A'><li class='filt'>Z-A</li></button>
                    </ul>
                
                </div> 

            </form>
     
        </div>
 
        <!--
            Form utilizzato per selezionare una band.

            Quando l'utente clicca sull'immagine di una band,
            viene inviato tramite POST il parametro "bandid"
            alla pagina /php/band_page.php.
        -->
        <form method='POST' action="/php/band_page.php">

        <?php

            $conn = connect_db(); // Apre una connessione al database.

            // Crea il contenitore principale delle card che verranno generate successivamente.
            echo "<div class='card-dark album-container'>";

            try {

                // Esegue la query SQL preparata precedentemente.
                //
                // $sql può essere una delle tre query:
                // - SELECT ... FROM band
                // - SELECT ... ORDER BY name
                // - SELECT ... ORDER BY name DESC
                $result = $conn->query($sql);
               
                // Controlla se la query ha restituito almeno una riga.
                if ($result->rowCount() > 0) {

                    // Recupera una riga alla volta dal risultato.
                    while($row = $result->fetch()) {
                        
                        // Per ogni band viene costruita una card HTML.
                        //
                        // $row['id']
                        //     -> ID della band
                        //
                        // $row['image_path']
                        //     -> percorso dell'immagine
                        //
                        // $row['name']
                        //     -> nome della band
                        echo "<div class='album foto'>
                              <figure class='figure border-neon'>

                              <!--
                                    Il pulsante contiene l'ID della band
                                    nel parametro value.

                                    Quando viene cliccato, il form esterno
                                    invia:
                                    
                                    bandid = ID_DELLA_BAND

                                    a /php/band_page.php
                                -->
                              <button tipe='submit' class='btn' value='".$row['id']."' name='bandid'><img src='".$row['image_path']."' class='figure-img foto_band' alt=".$row['name']."></button>
                              </br></br>
                              <!-- Nome della band -->
                              <figcaption class='figure-caption text-center text-neon-w'>".$row['name']."</figcaption>
                              </figure>
                              </div>";
                
                    }
                
                    // Elimina la variabile $result quando non serve più.
                    unset($result);
                    
                }else {

                    // Messaggio mostrato se il database non contiene nessuna band.
                    echo "No records found.";
            
                }
                
            } catch(PDOException $e) {
             
                // Se si verifica un errore PDO durante l'esecuzione della query, viene mostrato il relativo messaggio.
                echo "Error: " . $e->getMessage();
            
            }

            echo "</div>";


        ?>
        
        </form>
    </body>

</html>
