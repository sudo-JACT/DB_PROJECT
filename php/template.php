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
    echo "<link rel='preconnect' href='https://fonts.googleapis.com'>
          <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
          <link href='https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600;700;800&display=swap' rel='stylesheet'>";

    // aggiunta del font Inter
    echo "<link rel='preconnect' href='https://fonts.googleapis.com'>
          <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
          <link href='https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap' rel='stylesheet'>";

    // aggiunta del font Saira Condensed
    echo "<link rel='preconnect' href='https://fonts.googleapis.com'>
          <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
          <link href='https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@300;400;500;600;700;800&display=swap' rel='stylesheet'>";
}

function navbar() {

    $conn = connect_db();
    $s = session_checker();
    $ad = isadmin();

    $sql = "SELECT a.id as id, a.name as name, a.image_path as image_path, b.name as bname, a.price as price FROM album as a join published as p on p.album_id=a.id join band as b on b.id=p.band_id";
    $albums = $conn->query($sql);

    $sql = "SELECT id, name, image_path FROM band";
    $bands = $conn->query($sql);

    echo "<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
  <div class='container-fluid'>
    
    <a class='navbar-brand ' href='/'>
        <img src='/imgs/logo/Smugglers Logo.png' alt='Logo' width='90'>
    </a>
    
    <form class='d-flex search-form' role='search' method='POST' action='/php/search_page.php'>
            <input class='form-control search-box' type='search' placeholder='Search album...' aria-label='cerca' name='name'>
            <button class='search-btn' type='submit'>
                <img src='/imgs/img_tools/Lens.png' alt='Cerca'>
            </button>
    </form>

    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
    </button>

    
    <div class='collapse navbar-collapse' id='navbarNav'>
      
     
        <ul class='navbar-nav ms-auto'>
      
            <li class='nav-item album-menu'>
                
                <a class='nav-link' href='/php/albums.php'>ALBUMS</a>

                <div class='album-panel'>";

        if ($albums->rowCount() > 0) {
            
            $i=4;

            echo "<form method='POST' action='/php/product_page.php'>";


            while (($i > 0) && ($row = $albums->fetch())) {

                echo "<div class='card card-dark' style='color: #000000; background-color: #efefef; margin-right: 89px; border: 0px'>
                        <button class='btn'  style='' type='submit' value='".$row['id']."' name='productid'><img src='".$row['image_path']."' class='card-img-top' alt='".$row['name']."'>
                        </button>
                        <div class='card-body' style='color: #000000;'>
                            <p class='card-text text-neon-w' style='color: #000000;'>".$row['bname']."</p>
                            <p class='card-text text-neon' style='color: #000000;'>".$row['name']."</p>
                            <p class='card-text pricetag' style='color: #000000;'> ".roundPrice($row['price'])." € </p>
                        </div>
                    </div>";

                $i -= 1;    
            }
            
            echo "</form>";

        }

        echo "
                </div>

            </li>    

            <li class='nav-item bands-menu'>
                
                <a class='nav-link' href='/php/artists.php'>BANDS</a>
    
                <div class='bands-panel'>";

    if ($bands->rowCount() > 0) {
        
        $i=5;

        echo "<form method='POST' action='/php/band_page.php'>";

        while (($i > 0) && ($row = $bands->fetch())) {

            echo "<div class='album foto' style='color: #000000; margin-right: 20px;'>
                    <figure class='figure border-neon' style='color: #000000;'>
                    <button tipe='submit' class='btn' style='color: #000000;' value='".$row['id']."' name='bandid'><img src='".$row['image_path']."' class='figure-img foto_band' alt=".$row['name']."></button>
                    </br></br>
                    <figcaption class='figure-caption text-center text-neon-w' style='color: #000000;'>".$row['name']."</figcaption>
                    </figure>
                    </div>";


            $i -= 1;

        }

        echo "</form>";
    }



    echo "
                </div>

            </li> 

            <li class='nav-item'>
                <a class='nav-link' href='/php/cart.php'>CART</a>
            </li>
      
    ";

    echo "
        
    ";

    if ($ad) {

        echo "
        <li class='nav-item'>
            <a class='nav-link' href='/php/admin_panel.php'>PANEL</a>
        </li>";
    }


    if (!$s) {

        echo "
        <li class='nav-item'>
          <a class='nav-link' href='/php/login.php'>LOGIN</a>
        </li>";

    }else {

        echo "
        <li class='nav-item'>
          <a class='nav-link' href='/php/logout.php'>LOGOUT</a>
        </li>";

    }


    echo "</ul>
    </div>
    </div>
    </nav>";

}


function calcSale($price, $sale): float {

    return $price - ($price * ($sale / 100));

}


function roundPrice($price): string {

    if ($price === null || $price == 0) {

        return "0,00";

    }

    $tmp1 = (int)$price;
    $tmp2 = (int)(100*($price-$tmp1));

    if ($tmp2 == 0) {

        return (string)$tmp1 . ",00";

    }

    return (string)$tmp1 . "," . (string)$tmp2;
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
        $_SESSION['title'] = "SMUGGLERS"; 

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

    echo "<footer>
        
        <div class='login-background'>
        </div>

    </footer>";
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
