<?php
//////////////////////////////////////////////
///**********NE PAS MODIFIER***************///
//////////////////////////////////////////////

session_start();

include "../Controller.php";
include "Basketfct.php";

//echo $_SESSION['user'] ;



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // donnees formulaire
    $paymode = $_POST['paymode'];
    $numCB = $_POST['numCB'];
    $nomCarte = $_POST['nomCarte'];
    $DateExp = $_POST['DateExp'];
    $Crypto = $_POST['Crypto'];




    $prepare = Connection::$db->prepare("SELECT *
    FROM user
    JOIN moy_paiement ON user.id_moy_paiement = moy_paiement.id_moy_paiement
    WHERE user.id_user = :user_id
      AND moy_paiement.num_carte = :num_carte
      AND moy_paiement.type_carte = :type_carte
      AND moy_paiement.nom_carte = :nom_carte
      AND moy_paiement.date_exp = :date_exp
      AND moy_paiement.securite = :securite");

    $prepare->execute(array(
        'user_id' => $_SESSION['user'],
        'num_carte' => $numCB,
        'type_carte' => $paymode,
        'nom_carte' => $nomCarte,
        'date_exp' => $DateExp,
        'securite' => $Crypto
    ));

    // SI LIGNE EXACTE TROUVEE, ALORS PAIEMENT EFFECTUE
    if ($prepare->rowCount() > 0) {
        echo "paiement effectué";
        dropbasket();
    } else {
        echo "Les informations de paiement sont incorrectes.";
    }
}
?>

<!-- ********** -->
<!-- formulaire -->
<!-- ********** -->

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

