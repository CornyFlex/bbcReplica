<?php
    include 'connect.php';
    define('UPLPATH', 'img/');

    session_start();
    
$uspjesnaPrijava = '';
if (isset($_POST['prijava'])) {
    if (isset($_POST['username'])) {
        $loginUsername = $_POST['username'];
    }
    if (isset($_POST['password'])) {
        $loginPassword = $_POST['password'];
    }

    $sql = "SELECT korisnickoIme, lozinka, razina FROM korisnik WHERE korisnickoIme = ?";
    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $loginUsername);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }
    mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika);
    mysqli_stmt_fetch($stmt);

    if (password_verify($_POST['password'], $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt) > 0) {
        if ($levelKorisnika == 1) {
            $admin = true;
        } else {
            $admin = false;
        }
        $_SESSION['username'] = $imeKorisnika;
        $_SESSION['level'] = $levelKorisnika;

        header('Location: administracija.php');
    } else {
        header('Location: login.php?error=true');
    }
}

?>
