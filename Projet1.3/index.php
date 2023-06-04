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
                    <li><a style="color:black;text-decoration:none" href="front/ShowProfil.php">Personnel</a></li>
                </ul>
            </nav>

            <div class="flash"> 
                <h2>Ventes Flash !</h2>

            </div>

            <main>

                <div class ="container">

                    <div class="card">
                        <a href="produits.php">
                            <img src="front/images/iphone.jpg" class="image1">
                            <br>
                            <p>Iphone</p>
                        </a>
                    </div>

                    <div class="card">
                        <a href="produits.php">
                            <img src="front/images/macbook.jpeg" class="image1">
                            <p>Macbook</p>
                        </a>
                    </div>
                    <div class="card">
                        <img src="front/images/Max.jpg" class="image1">
                        <p>AirPods Max</p>
                    </div>

                    <div class="card">
                        <img src="front/images/Ipad.jpg" class="image1">
                        <p>Ipad</p>
                    </div>

                    <div class="card">
                        <img src="front/images/wheel.jpeg" class="image1">
                        <p>Apple Wheels</p>
                    </div>

                </div>
                <br>

                <div class="carousel">
                    <div class="slide">
                        <img src="front/images/wheel.jpeg" alt="Slide 1">
                    </div>
                    <div class="slide">
                        <img src="front/images/iphone.jpg" alt="Slide 2">
                    </div>
                    <div class="slide">
                        <img src="front/images/Ipad.jpg" alt="Slide 3">
                    </div>
                    <div class="slide">
                        <img src="front/images/Max.jpg" alt="Slide 3">
                    </div>
                    <div class="slide">
                        <img src="front/images/logo.png" alt="Slide 3">
                    </div>
                </div>

                <br>
                
                <div class ="container">
                    <p class="description">Bienvenue sur Agora Francia, votre destination ultime pour le shopping en ligne. Découvrez notre vaste sélection de produits de qualité, soigneusement choisis pour répondre à tous vos besoins. Avec des options de paiement sécurisées et une livraison rapide, Agora Francia offre une expérience d'achat en ligne simple et pratique. Faites confiance à notre plateforme pour trouver les dernières tendances, des articles uniques et profiter d'un service client exceptionnel. Explorez dès maintenant Agora Francia et laissez-vous séduire par notre offre diversifiée.</p>

                </div>




            </main>

            <footer>
                <h><a href="front/AboutUs.php">About us </a>| Credit © | 01 23 45 67 89 | agora@francia.com</h>
            </footer>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
