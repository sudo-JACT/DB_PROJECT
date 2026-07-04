<?php 

    $title = "ES 2b";
    $string = "Sono Mario Sturniolo mi piace la pasta";

    $days = range(1, 31);
    $months = range(1, 12);
    $years = range(2026, 2030);

?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <link rel="icon" type="image/x-icon" href="./imgs/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        <script src="./js/script.js"></script>
        <title><?php echo $title; ?></title>

    </head>

    <body>

        <form action="response.php", method="post">

            <fieldset>

                <legend>Immetti una data</legend>

                <p>Giorno <b><select name="Giorno">

                    <?php 

                        foreach ($days as $day) {

                            echo "<option value='" . $day . "'>" . $day . "</option>";               

                        }
                        //<option value="$">Opzione 1</option>

                    ?>

                </select></b></p>

                <p>Mese <b><select name="Mese">

                    <?php 

                        foreach ($months as $month) {

                            echo "<option value='" . $month . "'>" . $month . "</option>";               

                        }

                    ?>

                </select></b></p>


                <p>Anno <b><select name="Anno">

                    <?php 

                        foreach ($years as $year) {

                            echo "<option value='" . $year . "'>" . $year . "</option>";               

                        }
                        //<option value="$">Opzione 1</option>

                    ?>

                </select></b></p>


                <p>Ora    <b><input type="time" name="ora"></b></p>

            </fieldset>

            <input type="submit">
        </form>

    </body>

</html>