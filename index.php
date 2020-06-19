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
        <div class="row my-heading-row align-items-center justify-content-between">
            <div class="col-sm-3" id="left">
                <h5>Welcome to BBC.com</h5>
            </div>
            <div class="col-sm-3" id="right">
                <h5><?php
                    echo date('l, j F');
                    ?></h5>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row my-article-description align-items-center">
            <div class="col-sm-12">
                <h5 id="news">News</h5>
            </div>
        </div>
    </div>

    <section class="news">
        <div class="container">
            <div class="row my-article-row-news">
                <?php
                $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='news' ORDER BY datum DESC LIMIT 3";
                $result = mysqli_query($dbc, $query);
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                    echo '<div class="col-sm-4">';
                    echo '<a href="clanak.php?id=' . $row['id'] . '&kategorija=' . $row['kategorija'] . '"><img width="100%" height="205px" src="' . UPLPATH . $row['slika'] . '"/>';
                    echo '<h5 class="articleHeading">';
                    echo $row['naslov'];
                    echo '</a></h5>';
                    echo '<p>' . $row['sazetak'] . '</p>';
                    echo '</div>';
                } ?>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row my-article-description align-items-center">
            <div class="col-sm-12">
                <h5 id="sport">Sport</h5>
            </div>
        </div>
    </div>

    <section class="sport">
        <div class="container">
            <div class="row my-article-row-sport">
                <?php
                $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='sport' ORDER BY datum DESC LIMIT 3";
                $result = mysqli_query($dbc, $query);
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                    echo '<div class="col-sm-4">';
                    echo '<a href="clanak.php?id=' . $row['id'] . '&kategorija=' . $row['kategorija'] . '"><img width="100%" height="205px" src="' . UPLPATH . $row['slika'] . '"/>';
                    echo '<h5 class="articleHeading">';
                    echo $row['naslov'];
                    echo '</a></h5>';
                    echo '<p>' . $row['sazetak'] . '</p>';
                    echo '</div>';
                } ?>
            </div>
        </div>
    </section>

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
</body>

</html>