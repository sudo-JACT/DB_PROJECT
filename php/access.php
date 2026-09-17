<?php

    include_once("./template.php");

    $conn = connect_db();

    if (isset($_POST['name']) && isset($_POST['email'])) {

        try {

            $sql = "SELECT id, username, email, passwd, isadmin FROM user WHERE username = :name AND email = :email AND passwd = PASSWORD(:passwd)"; // query per fetchare il db

            $result = $conn->prepare($sql);  

            // sostituisco le variabili che iniziano con :, inserendo al loro posto le i dati che mi arrivano dalla post

            $result->execute([
                'name'   => $_POST['name'],
                'email'  => $_POST['email'],
                'passwd' => $_POST['passwd']
            ]);

            // controllo se essiste l'utente
            if ($result->rowCount() > 0) {

                $row = $result->fetch();

                $user = ["name"=>$row['username'], "email"=>$row['email'], "role"=>$row['isadmin'], "passwd"=>$_POST['passwd'], "id"=>$row['id']];

                // passo l'utente al setter 
                session_setter($user);

                //riporto l'utente alla home
                header('Location: '.'/'); 


            } else {

                head(false);

                echo "<div class='title'>";

                echo "<h1>Error: user not found</h1>";

                echo "</div>";
            }

        } catch (PDOException $e) {

            echo "<h1>Error: " . $e->getMessage() . "</h1>";

        }


    } else {

        $user = ["passwd"=>$_POST['passwd']];
        session_setter($user);

        header('Location: '.'/'); 

    }


?>
