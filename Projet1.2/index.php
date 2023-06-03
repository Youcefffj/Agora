<?php
session_start();
//echo $_SESSION["user"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Agora Francia - Site de e-commerce</title>
        <link rel="stylesheet" type="text/css" href="front/style.css">
        <link rel="Website icon" type="png" href="front/images/logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Dernier CSS compilé et minifié -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!-- Bibliothèque jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <!-- Dernier JavaScript compilé -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="script.js"></script>



    </head>
    <body>
        <div class="wrapper">
            <header>
                <h1>Agora Francia</h1>
                <img src="front/images/logo.png" alt="logo" class="logo">
            </header>

            <nav>
                <ul class="list">
                    <li><a style="color:black;text-decoration:none" href="index.php">Accueil</a></li>
                    <li><a style="color:black;text-decoration:none" href="front/produits.php">Tout parcourir</a></li>
                    <li><a style="color:black;text-decoration:none" href="front/notifications.php">Notifications</a></li>
                    <li><a style="color:black;text-decoration:none" href="front/Panier.php">Panier</a></li>
                    <li><a style="color:black;text-decoration:none" href="front/formlulairemodif.php">Votre Compte</a></li>
                </ul>
            </nav>

            <div class="flash"> 
                <h2>Meilleures ventes</h2>

            </div>

            <main>

                <div class ="container">

                    <div class="card">
                        <a href="produits.php">
                            <img src="images/iphone.jpg" class="image1">
                            <br>
                            <p>Iphone</p>
                        </a>
                    </div>

                    <div class="card">
                        <a href="produits.php">
                            <img src="images/macbook.jpeg" class="image1">
                            <p>Macbook</p>
                        </a>
                    </div>
                    <div class="card">
                        <img src="images/Max.jpg" class="image1">
                        <p>AirPods Max</p>
                    </div>

                    <div class="card">
                        <img src="images/Ipad.jpg" class="image1">
                        <p>Ipad</p>
                    </div>

                    <div class="card">
                        <img src="images/wheel.jpeg" class="image1">
                        <p>Apple Wheels</p>
                    </div>

                </div>
                <br>

                <div class="carousel">
                    <div class="slide">
                        <img src="images/wheel.jpeg" alt="Slide 1">
                    </div>
                    <div class="slide">
                        <img src="images/iphone.jpg" alt="Slide 2">
                    </div>
                    <div class="slide">
                        <img src="images/Ipad.jpg" alt="Slide 3">
                    </div>
                    <div class="slide">
                        <img src="images/Max.jpg" alt="Slide 3">
                    </div>
                    <div class="slide">
                        <img src="images/logo.png" alt="Slide 3">
                    </div>
                </div>

                <br>
                
                <div class ="container">

                    <div class="card"></div>
                    <div class="card"></div>
                    <div class="card"></div>
                    <div class="card"></div>
                    <div class="card"></div>

                </div>




            </main>

            <footer>
                <h><a href="AboutUs.php">About us </a>| Credit | ce que tu veux | blablabla</h>
            </footer>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
