<?php





function head($index) {

    session_checker();

    if ($index) {
    

        echo "<head>";

        echo "<meta charset='UTF-8'>";
        echo "<link rel='icon' type='image/x-icon' href='./imgs/favicon.ico'>";
        echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB' crossorigin='anonymous'>";
        echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js' integrity='sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI' crossorigin='anonymous'></script>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<link rel='stylesheet' href='./css/style.css'>";
        echo "<script src='./js/script.js'></script>";
        echo "<title>".$_SESSION['title']."</title>";

        echo "</head>";

    } else {


        echo "<head>";

        echo "<meta charset='UTF-8'>";
        echo "<link rel='icon' type='image/x-icon' href='../imgs/favicon.ico'>";
        echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB' crossorigin='anonymous'>";
        echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js' integrity='sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI' crossorigin='anonymous'></script>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<link rel='stylesheet' href='../css/style.css'>";
        echo "<script src='../js/script.js'></script>";
        echo "<title>".$_SESSION['title']."</title>";


        echo "</head>";


    }

}

function navbar($index) {

    // center per centrare la barra di navigazione
    echo "<ul class='nav justify-content-center'>";

    $s = session_checker();
    $ad = isadmin();

    if ($index) {

    
        echo "<li class='nav-item'>";
        echo "<a class='nav-link active text-neon-w' aria-current='page' href='/'>HOME</a>";
        echo "</li>";

        echo "<li class='nav-item'>";
        echo "<a class='nav-link text-neon-w' href='./php/albums.php'>ALBUMS</a>";
        echo "</li>";

        echo "<li class='nav-item'>";
        echo "<a class='nav-link text-neon-w' href='./php/artists.php'>ARTISTS</a>";
        echo "</li>";

        if (!$s) {

            echo "<li class='nav-item'>";
            echo "<a class='nav-link text-neon-w' href='./php/login.php'>LOGIN</a>";
            echo "</li>";

        }else {

            // carrello
            echo "<li class='nav-item'>";
            echo "<a class='nav-link text-neon-w' href='./lol.php'>CART</a>";
            echo "</li>";


            echo "<li class='nav-item'>";
            echo "<a class='nav-link text-neon-w' href='./php/logout.php'>LOGOUT</a>";
            echo "</li>";

        }

        if ($ad) {

            echo "<li class='nav-item'>";
            echo "<a class='nav-link text-neon-w' href='./php/admin_panel.php'>PANEL</a>";
            echo "</li>";

        }




    } else {

    
        echo "<li class='nav-item'>";
        echo "<a class='nav-link active text-neon-w' aria-current='page' href='/'>HOME</a>";
        echo "</li>";

        echo "<li class='nav-item'>";
        echo "<a class='nav-link text-neon-w' href='./albums.php'>ALBUMS</a>";
        echo "</li>";

        echo "<li class='nav-item'>";
        echo "<a class='nav-link text-neon-w' href='./artists.php'>ARTISTS</a>";
        echo "</li>";

        // login-logout panel
        if (!$s) {

            echo "<li class='nav-item'>";
            echo "<a class='nav-link text-neon-w' href='./login.php'>LOGIN</a>";
            echo "</li>";

        }else {
 
            echo "<li class='nav-item'>";
            echo "<a class='nav-link text-neon-w' href='./lol.php'>CART</a>";
            echo "</li>";


            echo "<li class='nav-item'>";
            echo "<a class='nav-link text-neon-w' href='./logout.php'>LOGOUT</a>";
            echo "</li>";


        }

        // admin panel
        if ($ad) {

            echo "<li class='nav-item'>";
            echo "<a class='nav-link text-neon-w' href='./admin_panel.php'>PANEL</a>";
            echo "</li>";

        }





    }


    echo "</ul>";


}




function isadmin(): bool {

    if (isset($_SESSION['role'])) {

        if ($_SESSION['role'] == 1) {

            return true;

        }

    }

    return false;
}

function session_checker(): bool {

    if (session_status() === PHP_SESSION_NONE) {

        session_start();


        $_SESSION['servername'] = "mariadb";
        $_SESSION['username'] = "root";
        $_SESSION['password'] = "root";
        $_SESSION['dbname'] = "proddb";
        $_SESSION['title'] = "bibi"; 

    }

    return isset($_SESSION['id']);

}


function cookie_checker(): bool {

    if (isset($_COOKIE['JWT'])) {

        return true;

    }

    return false;

}



function session_setter($user) {

    $dtime = 100;

    if ($user === null) {

        return;

    }


    if (cookie_checker()) {

        $_SESSION['JWT'] = $_COOKIE['JWT'];


        $user = decode_jwt($user['passwd'], $_COOKIE['JWT']);

        if ($user === null) {

            return;

        }

        $user = $user['payload'];

    } else {

        $token = gen_jwt($user);

        $_SESSION['JWT'] = $token;

        setcookie('JWT', $_SESSION['JWT'], time()+$dtime, "/");

    }


    $_SESSION['id'] = $user['id'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['role'] = $user['role'];

    return;
}


function logout() {

    $_SESSION = [];

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }



    if (isset($_COOKIE['JWT'])) {
        setcookie('JWT', '', time() - 42000, "/");
        unset($_COOKIE['JWT']);
    }

}



function connect_db(): PDO {

    session_checker();

    try {

        $conn = new PDO("mysql:host={$_SESSION['servername']};dbname={$_SESSION['dbname']}", $_SESSION['username'], $_SESSION['password']);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;


    } catch(PDOException $e) {

        return null;

    }


}


function footer() {

    //asdasddsaadsad

}



function gen_jwt($user): string {

    $head = json_encode(["alg"=>"HS512", "typ"=>"JWT"]);
    $head = base64_encode($head);

    $payload = ["id"=>$user['id'], "name"=>$user['name'], "role"=>$user['role']];
    $payload= json_encode($payload);
    $payload = base64_encode($payload);


    $firma = hash_hmac('sha512', $head.".".$payload, $user['passwd'], true);
    $firma = base64_encode($firma);

    return $head.".".$payload.".".$firma;
}


function decode_jwt($key, $token): ?array {

    $parts = explode(".", $token);

    if (count($parts) != 3) {

        return null;

    }

    list($encodedhead, $encodedpayload, $firma) = $parts;


    $head = json_decode(base64_decode(strtr($encodedhead, '-_', '+/')), true);
    $payload = json_decode(base64_decode(strtr($encodedpayload, '-_', '+/')), true);
    $firma = base64_decode(strtr($firma, '-_', '+/'));


    if ($head === null || $payload === null) {

        return null;

    }


    $new_firma = hash_hmac('sha512', $encodedhead.".".$encodedpayload, $key, true);


    if (!hash_equals($firma, $new_firma)) {

        return null;

    }

    return ["head"=>$head, "payload"=>$payload];

}
?>
