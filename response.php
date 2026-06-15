<h1>

<?php 

    if ($_POST['Giorno'] && $_POST['Mese'] && $_POST['Anno'] && $_POST['ora']) {

        
        echo "Il tuo appuntamento è stato prenotato per il " . $_POST["Giorno"] . "/" . $_POST["Mese"] . "/" . $_POST["Anno"] . "/ alle ore " . $_POST["ora"];
        
    }

?>

</h1>