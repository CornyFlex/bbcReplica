<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBC</title>

    <!-- Style link-->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Boostrap 4 link-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Style login-->
    <link rel="stylesheet" type="text/css" href="styleLogin.css">

</head>

<body>
    <?php
    include 'connect.php';
    define('UPLPATH', 'img/');
    session_start();
    ?>
    <header>
        <div class="container">
            <nav class="nav navbar-expand-sm navbar-dark bg-dark" width="100%">
                <a href="index.php" class="navbar-brand"><img src="logo-transparent.png" alt="BBC LOGO" height="37.5px" width="90px"></a>
                <button class="navbar-toggler ml-auto" data-toggle="collapse" data-target="#navbarMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="kategorija.php?id=news" class="nav-link">News</a></li>
                        <li class="nav-item"><a href="kategorija.php?id=sport" class="nav-link">Sport</a></li>
                        <li class="nav-item"><a href="administracija.php" class="nav-link">Administracija</a></li>
                        <li class="nav-item"><a href="unos.php" class="nav-link">Unos</a></li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <?php if (isset($_SESSION['username'])) {
                            echo '<li class="nav-item"><span class="nav-link">Logged in as: ' . $_SESSION['username'] . '</span></li>';
                            echo '<li class="nav-item"><a href="logout.php" class="nav-link">LOG OUT</a></li>';
                        } else {
                            echo '<li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>';
                            echo '<li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>';
                        } ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto morePaddingRegister">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Register</h5>
                        <form class="form-signin" method="POST" action="redirectRegister.php">
                            <div class="form-label-group">
                                <input type="text" class="form-control" placeholder="Ime:" name="ime" id="ime" autofocus>
                                <label for="ime">Ime</label>
                                <span id="porukaIme" style="color:red;"></span>
                            </div>

                            <div class="form-label-group">
                                <input type="text" class="form-control" placeholder="Prezime:" name="prezime" id="prezime">
                                <label for="prezime">Prezime</label>
                                <span id="porukaPrezime" style="color:red;"></span>
                            </div>

                            <div class="form-label-group">
                                <input type="text" class="form-control" placeholder="Username:" name="username" id="username">
                                <label for="username">Korisnicko ime</label>
                                <span id="porukaUsername" style="color:red;"></span>
                            </div>

                            <div class="form-label-group">
                                <input type="password" class="form-control" placeholder="Lozinka" name="pass" id="pass">
                                <label for="pass">Lozinka</label>
                                <span id="porukaPass" style="color:red;"></span>
                            </div>

                            <div class="form-label-group">
                                <input type="password" class="form-control" placeholder="Ponovljena lozinka" name="passRep" id="passRep">
                                <label for="passRep">Ponovljena lozinka</label>
                                <span id="porukaPassRep" style="color:red;"></span>
                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="reg" id="registracija">Register</button>
                            <hr class="my-4">
                            <div id="porukaRegister" style="text-align:center;color:red;"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row my-footer-row">
                <div class="col-xs-12 my-text-footer align-self-end">
                    <p><b>Author: Karlo Auguštanec, Email: kaugustan@tvz.hr</b><br/><b>Copyright © 2019 BBC.</b> The BBC is not responsible for the content of external sites.<b> Read about our approach to external linking.</b></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- JS link -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script type="text/javascript">
        document.getElementById("registracija").onclick = function(event) {
            var slanjeForme = true;

            //ime
            var poljeIme = document.getElementById("ime");
            var ime = document.getElementById("ime").value;
            if (ime.length == 0) {
                slanjeForme = false;
                poljeIme.style.border = "1px dashed red";
                document.getElementById("porukaIme").innerHTML = "<br>Unesite ime!<br>";
            } else {
                document.getElementById("porukaIme").innerHTML = "";
            }

            //prezime
            var poljePrezime = document.getElementById("prezime");
            var prezime = document.getElementById("prezime").value;
            if (prezime.length == 0) {
                slanjeForme = false;
                poljePrezime.style.border = "1px dashed red";
                document.getElementById("porukaPrezime").innerHTML = "<br>Unesite Prezime!<br>";
            } else {
                document.getElementById("porukaPrezime").innerHTML = "";
            }

            //korisnicko ime
            var poljeUsername = document.getElementById("username");
            var username = document.getElementById("username").value;
            if (username.length == 0) {
                slanjeForme = false;
                poljeUsername.style.border = "1px dashed red";
                document.getElementById("porukaUsername").innerHTML = "<br>Unesite korisničko ime!<br>";
            } else {
                document.getElementById("porukaUsername").innerHTML = "";
            }

            //lozinka
            var poljePass = document.getElementById("pass");
            var pass = document.getElementById("pass").value;
            var poljePassRep = document.getElementById("passRep");
            var passRep = document.getElementById("passRep").value;
            if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
                slanjeForme = false;
                poljePass.style.border = "1px dashed red";
                poljePassRep.style.border = "1px dashed red";
                document.getElementById("porukaPass").innerHTML = "<br>Lozinke nisu iste!<br>";
                document.getElementById("porukaPassRep").innerHTML = "<br>Lozinke nisu iste!<br>";
            } else {
                document.getElementById("porukaPass").innerHTML = "";
                document.getElementById("porukaPassRep").innerHTML = "";
            }

            if (slanjeForme != true) {
                event.preventDefault();
            }
        }
    </script>

</body>

</html>

<?php 
if (isset($_GET['errorRegister'])) {
    $error = $_GET['errorRegister'];

    if ($error) {
        echo '<script type="text/javascript">';
        echo 'document.getElementById("porukaRegister").innerHTML = "Registration failed, please try again."';
        echo '</script>';
    }
}

?>