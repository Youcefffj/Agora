<!DOCTYPE html>
<html>
<head>
    <title>Agora Francia - Catégories de produits</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="Website icon" type="png" href="images/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Agora Francia</h1>
            <img src="images/logo.png" alt="logo" class="logo">
        </header>

        <nav>
            <ul class="list">
                <li><a style="color:black;text-decoration:none" href="index.php">Accueil</a></li>
                <li><a style="color:black;text-decoration:none" href="produits.php">Tout parcourir</a></li>
                <li><a style="color:black;text-decoration:none" href="notifications.php">Notifications</a></li>
                <li><a style="color:black;text-decoration:none" href="#">Panier</a></li>
                <li><a style="color:black;text-decoration:none" href="login.php">Votre Compte</a></li>
            </ul>
        </nav>

        <div class="flash">
            <h2>Catégories de produits</h2>
        </div>

        <main>
            <div class="container">
                <div class="card">
                    <a href="encheres.php">
                        <img src="images/encheres.jpg" class="image1">
                        <br>
                        <p>Enchères</p>
                    </a>
                </div>

                <div class="card">
                    <a href="neufs.php">
                        <img src="images/neufs.jpg" class="image1">
                        <br>
                        <p>Neufs</p>
                    </a>
                </div>

                <div class="card">
                    <a href="reconditionnes.php">
                        <img src="images/reconditionnes.jpg" class="image1">
                        <br>
                        <p>Reconditionnés</p>
                    </a>
                </div>
            </div>
        </main>

        <footer>
            <h><a href="AboutUs.php">À propos de nous</a> | Crédits | Ce que tu veux | Blablabla</h>
        </footer>
    </div>
</body>
</html>
