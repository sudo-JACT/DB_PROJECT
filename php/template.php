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

    // aggiunta del font Barlow Condensed
    echo "<link rel='preconnect' href='https://fonts.googleapis.com'>";
    echo "<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>";
    echo "<link href='https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600;700;800&display=swap' rel='stylesheet'>";

    // aggiunta del font Inter
    echo "<link rel='preconnect' href='https://fonts.googleapis.com'>";
    echo "<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>";
    echo "<link href='https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap' rel='stylesheet'>";

    // aggiunta del font Saira Condensed
    echo "<link rel='preconnect' href='https://fonts.googleapis.com'>";
    echo "<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>";
    echo "<link href='https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@300;400;500;600;700;800&display=swap' rel='stylesheet'>";
}

function navbar() {

    $s = session_checker();
    $ad = isadmin();


    echo "<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
  <div class='container-fluid'>
    
    <a class='navbar-brand ' href='/'>
        <img src='/imgs/logo/Smugglers Logo.png' alt='Logo' width='100'>
    </a>
    

    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    
    <div class='collapse navbar-collapse' id='navbarNav'>
      
     
      <ul class='navbar-nav ms-auto'>
        <li class='nav-item'>
          <a class='nav-link' href='/php/albums.php'>ALBUMS</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='/php/artists.php'>BANDS</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='/php/cart.php'>CART</a>
        </li>
      </ul>
    ";

    if ($ad) {

        echo "<ul class='navbar-nav'>
        <li class='nav-item'>
          <a class='nav-link' href='/php/admin_panel.php'>PANEL</a>
        </li>";
    }


    if (!$s) {

        echo "<ul class='navbar-nav'>
        <li class='nav-item'>
          <a class='nav-link' href='/php/login.php'>LOGIN</a>
        </li>";

    }else {

        echo "<ul class='navbar-nav'>
        <li class='nav-item'>
          <a class='nav-link' href='/php/logout.php'>LOGOUT</a>
        </li>";

    }


    echo "</ul>
    </div>
    </div>
    </nav>";


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
        $_SESSION['title'] = "WELCOME TO SMUGGLERS!!!"; 

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
