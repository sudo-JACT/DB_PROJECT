<?php

    include_once("./template.php"); // inclusione del template.php

    logout(); // terminare sessione utente

    header('Location: '.'/'); // utente riportato alla homepage

?>

