<!DOCTYPE html>
<html>
    <head>
        <title>Agora Francia - Notifications</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="Website icon" type="png" href="images/logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <nav>
                <ul class="list">
                    <li><a style="color:black;text-decoration:none" href="index.php">Accueil</a></li>
                    <li><a style="color:black;text-decoration:none" href="produits.php">Tout parcourir</a></li>
                    <li><a style="color:black;text-decoration:none" href="notifications.php">Notifications</a></li>
                    <li><a style="color:black;text-decoration:none" href="#">Panier</a></li>
                    <li><a style="color:black;text-decoration:none" href="formlulairemodif.php">Votre Compte</a></li>
                </ul>
            </nav>
            <header>
                <h1>Notifications</h1>
            </header>

            <main>
                <div class="walou">
                    <div class="parent">
                        <div class="form">
                            <form action="send_notification.php" method="post">
                                <input type="email" name="email" class="input" placeholder="Adresse e-mail :" required>
                                <br><br>
                                <input type="text" name="product" class="input" placeholder="Produit :" required>
                                <br><br>
                                <button type="submit" class="send">S'inscrire à la notification</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <footer>
                <h><a href="AboutUs.php">About us </a>| Credit | ce que tu veux | blablabla</h>
            </footer>
        </div>
    </body>
</html>
