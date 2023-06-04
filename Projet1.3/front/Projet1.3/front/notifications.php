
<?php
include "../Connection.php";

session_start();


function envoyerMailBienvenue($email) {
    // Vérifier si l'adresse e-mail existe dans la base de données ou dans votre système
        // Construire le contenu du mail
        $sujet = "Bienvenue sur notre site !";
        $message = "Bienvenue sur notre site !\n\nNous vous remercions de votre inscription.\n\nCordialement,\nL'équipe du site";
        $headers = "From: VotreNom <votre@email.com>";
        
        // Envoyer le mail
        if (mail($email, $sujet, $message, $headers)) {
            return true; // Le mail a été envoyé avec succès
        } else {
            return false; // Une erreur s'est produite lors de l'envoi du mail
        }

}
?>

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
        <script src="script.js"></script>
    </head>

    <body>
        <div class="wrapper">
            <nav>
                <ul class="list">
                    <li><a style="color:black;text-decoration:none" href="../index.php">Accueil</a></li>
                    <li><a style="color:black;text-decoration:none" href="produits.php">Tout parcourir</a></li>
                    <li><a style="color:black;text-decoration:none" href="notifications.php">Notifications</a></li>
                    <li><a style="color:black;text-decoration:none" class="perso" href="Panier.php">Panier</a></li>
                    <li><a style="color:black;text-decoration:none" class="PasCompte" href="formlulairemodif.php">Votre Compte</a></li>
                    <li><a style="color:black;text-decoration:none" class="perso" href="ShowProfil.php">Personnel</a></li>
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
                <h><a href="AboutUs.php">About us </a>| Credit © | 01 23 45 67 89 | agora@francia.com</h>
            </footer>
        </div>
    </body>

</html>

<script>
    window.onload = function() {
        var liens = document.getElementsByClassName("perso");

        // Vérifiez ici votre condition pour rendre les liens non cliquables
        var isUserLoggedIn = <?php echo isset($_SESSION["user"]) ? 'true' : 'false'; ?>;
        if (!isUserLoggedIn) {
            for (var i = 0; i < liens.length; i++) {
                var lien = liens[i];
                lien.removeAttribute("href");
                lien.style.pointerEvents = "none";
                lien.style.color = "gray";
            }
        }
        var liens = document.getElementsByClassName("PasCompte");

        // Vérifiez ici votre condition pour rendre les liens non cliquables
        var isUserLoggedIn = <?php echo isset($_SESSION["user"]) ? 'true' : 'false'; ?>;
        if (isUserLoggedIn) {
            for (var i = 0; i < liens.length; i++) {
                var lien = liens[i];
                lien.removeAttribute("href");
                lien.style.pointerEvents = "none";
                lien.style.color = "gray";
            }
        }
    }
</script>
