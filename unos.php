<?php 
sessioN_start();
?>
<!DOCTYPE html>

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
        <form enctype="multipart/form-data" method="POST" action="skripta.php" class="formaZaUnos" name="unosPodatakaForma">
            <h4>Forma za unos članka</h4><br>
            <div class="form-group">
                <label for="naslovClanka">Naslov članka:</label>
                <input class="form-control" type="text" id="naslovClanka" placeholder="Naslov članka" name="naslov" required autofocus>
                <span id="porukaNaslov" style="color:red;"></span>
            </div>
            <div class="form-group">
                <label for="kratkiSazetak">Kratki sažetak članka:</label>
                <textarea class="form-control" id="kratkiSazetak" rows="3" name="kratkiSazetak" required></textarea>
                <span id="porukaSazetak" style="color:red;"></span>
            </div>
            <div class="form-group">
                <label for="tekstVijesti">Tekst vijesti:</label>
                <textarea class="form-control" id="tekst" rows="7" name="tekstVijesti"></textarea>
                <span id="porukaTekst" style="color:red;"></span>
            </div>
            <div class="form-group">
                <label for="odabirKategorije">Kategorija vijesti:</label>
                <select class="form-control" id="odabirKategorije" name="odabirKategorije" required>
                    <option value="news">News</option>
                    <option value="sport">Sport</option>
                </select>
            </div>
            <div class="form-group">
                <label for="odabirSlike">Odabir Slike</label>
                <input type="file" class="form-control-file" id="odabirSlike" name="odabirSlike" required>
                <span id="porukaSlika" style="color:red;"></span>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="prikazObavijesti" name="prikazObavijesti" value="obavijest">
                <label class="form-check-label" for="prikazObavijesti">Želite li arhivirati članak? (članak koji je arhiviran se ne prikazuje na stranici)</label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="posalji" id="slanje" style="margin-bottom:5px;margin-top:10px;">Pošalji</button>
            </div>
        </form>
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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script type="text/javascript">
        document.getElementById("slanje").onclick = function(event) {

            var slanjeForme = true;

            //provjera naslova (1-30 znakova)
            var poljeTitle = document.getElementById("naslovClanka");
            var title = document.getElementById("naslovClanka").value;
            if (title.length < 5 || title.length > 30) {
                slanjeForme = false;
                poljeTitle.style.border = "1px dashed red";
                document.getElementById("porukaNaslov").innerHTML = "Naslov vjesti mora imati između 5 i 30 znakova!<br>";
            } else {
                poljeTitle.style.border = "1px solid green";
                document.getElementById("porukaNaslov").innerHTML = "";
            }

            //provjera kratkog sadrzaja (1-100 znakova)
            var poljeAbout = document.getElementById("kratkiSazetak");
            var about = document.getElementById("kratkiSazetak").value;
            if (about.length < 1 || title.length > 100) {
                slanjeForme = false;
                poljeAbout.style.border = "1px dashed red";
                document.getElementById("porukaSazetak").innerHTML = "Kratki sadržaj mora imati između 10 i 100 znakova!<br>";
            } else {
                poljeAbout.style.border = "1px solid green";
                document.getElementById("porukaSazetak").innerHTML = "";
            }

            //provjera teksta (vise od 0 znakova)
            var poljeContent = document.getElementById("tekst");
            var content = document.getElementById("tekst").value;
            if (content.length == 0) {
                slanjeForme = false;
                poljeContent.style.border = "1px dashed red";
                document.getElementById("porukaTekst").innerHTML = "Sadržaj mora biti unesen!<br>";
            } else {
                poljeContent.style.border = "1px solid green";
                document.getElementById("porukaTekst").innerHTML = "";
            }

            //provjera slike (mora biti unesena)
            var poljeSlika = document.getElementById("odabirSlike");
            var slika = document.getElementById("odabirSlike").value;
            if (slika.length == 0) {
                slanjeForme = false;
                poljeSlika.style.border = "1px dashed red";
                document.getElementById("porukaSlika").innerHTML = "Slika mora biti unesena!<br>";
            } else {
                poljeSlika.style.border = "1px solid green";
                document.getElementById("porukaSlika").innerHTML = "";
            }

            if (slanjeForme != true) {
                event.preventDefault();
            }
        }
    </script>

</body>

</html>