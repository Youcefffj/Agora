<!DOCTYPE html>
<html>
    <head>
        <title>Agora Francia - Paiement</title>
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
                    <li><a style="color:black;text-decoration:none" href="panier.php">Panier</a></li>
                    <li><a style="color:black;text-decoration:none" href="formlulairemodif.php">Votre Compte</a></li>
                </ul>
            </nav>
            <header>
                <h1>Paiement</h1>
            </header>

            <main>
                <div class="parent">
                    <div class="form">
                        <form method="POST">
                            
                            <div class="form-dropdown">
                                <label for="paymode">Mode de paiement:</label>
                                <select id="paymode" name="paymode">
                                    <option value="NULL"></option>
                                    <option value="Mastercard">Mastercard</option>
                                    <option value="Visa">Visa</option>
                                    <option value="Amex">Amex</option>
                                </select>
                            </div>

                            <div class="form-line">
                                <input class="input" type="number" name="numCB" placeholder="Numéro de carte" required>
                            </div>
                            <br>

                            <div class="form-line">
                                <input class="input" type="text" name="nomCarte" placeholder="Nom sur la carte" required>
                            </div>
                            <br>

                            <div class="form-line">
                                <input class="input" type="month" name="DateExp" placeholder="Date d'expiration" min="2023-06" max="2058-12" required>
                            </div>
                            <br>

                            <div class="form-line">
                                <input class="input" type="number" name="Crypto" placeholder="Cryptogramme" required>
                            </div>
                            <br>
                            <input class="send" type="submit" value="Soumettre">
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
