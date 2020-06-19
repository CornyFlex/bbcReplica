<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBC-article</title>

    <!-- Style link-->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Boostrap 4 link-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>

<body style="background-color:#343a40;">
    <?php
    include 'connect.php';
    define('UPLPATH', 'img/');

    session_start();

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        mysqli_query($dbc, "DELETE FROM vijesti WHERE id='$id'") or die(mysqli_error($dbc));
    }
    ?>
    <header>
        <div class="container">
            <nav class="nav navbar-expand-sm navbar-dark bg-dark" width="100%">
                <a href="index.php" class="navbar-brand"><img src="logo-transparent.png" alt="BBC LOGO" height="37.5px" width="90px"></a>
                <button class="navbar-toggler ml-auto" data-toggle="collapse" data-target="#navbarMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav">
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
    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <table class="table table-hover table-dark table-bordered table-responsive">
                    <?php
                    if ((isset($_SESSION['username'])) && $_SESSION['level'] == 1) {
                        echo '<thead>';
                        echo '<tr style="text-align:center;">';
                        echo '<th scope="col">Article name</th>';
                        echo '<th scope="col">Date posted</th>';
                        echo '<th scope="col">Heading</th>';
                        echo '<th scope="col">Content</th>';
                        echo '<th scope="col">Image</th>';
                        echo '<th scope="col">Category</th>';
                        echo '<th scope="col">Archive</th>';
                        echo '<th scope="col">Edit</th>';
                        echo '<th scope="col">Delete</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        $query = "SELECT * FROM vijesti";
                        $result = mysqli_query($dbc, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<tr style="text-align:center;">';
                            echo '<th style="width:10%;"class="align-middle" scope="row">' . $row['naslov'] . '</th>';
                            echo '<td style="width:7%;" class="align-middle">' . $row['datum'] . '</td>';
                            echo '<td style="width:15%;" class="align-middle">' . $row['sazetak'] . '</td>';
                            echo '<td style="width:20%;" class="align-middle">' . $row['tekst'] . '</td>';
                            echo '<td style="text-align:center;width:30%;" class="align-middle"><img height="250px" width="70%" src="' . UPLPATH . $row['slika'] . '"</td>';
                            echo '<td class="align-middle">' . strtoupper($row['kategorija']) . '</td>';
                            if ($row['arhiva'] == '1') {
                                echo '<td class="align-middle">Yes</td>';
                            } else {
                                echo '<td class="align-middle">No</td>';
                            }
                            echo '<td class="align-middle"><a href="edit.php?edit=' . $row['id'] . '&arhivaEdit=' . $row['arhiva'] . '" class="btn btn-info">EDIT</a></td>';
                            echo '<td class="align-middle"><a href="administracija.php?delete=' . $row['id'] . '" class="btn btn-danger">DELETE</a></td>';
                            echo '</tr>';
                        }
                    } else if (isset($_SESSION['username']) && $_SESSION['level'] == 0) {
                        echo '<div class="container" style="text-align:center;">';
                        echo '<h4 style="color:white;">Bok ' . $_SESSION['username'] . '! Uspješno ste prijavljeni, ali niste administrator.</h4>';
                        echo '</div>';
                    } else {
                        echo '<div class="container">';
                        echo '<h4 style="color:white;">Niste prijavljeni. </h4><br/>';
                        echo '<h4 style="color:white;">Prijavite se <a href="login.php">OVDJE</a>, ili se registrirajte <a href="register.php">OVDJE</a>.</h4>';
                        echo '</div>';
                    }
                    ?>
                    </tbody>
                </table>
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
</body>

</html>