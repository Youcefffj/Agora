<?php

//////////////////////////////////////////////
///**********NE PAS MODIFIER***************///
//////////////////////////////////////////////

session_start();

include "../Controller.php";

//echo $_SESSION['user'] ;
?>

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
                    <li><a style="color:black;text-decoration:none" href="../index.php">Accueil</a></li>
                    <li><a style="color:black;text-decoration:none" href="produits.php">Tout parcourir</a></li>
                    <li><a style="color:black;text-decoration:none" href="notifications.php">Notifications</a></li>
                    <li><a style="color:black;text-decoration:none" href="panier.php">Panier</a></li>
                    <li><a style="color:black;text-decoration:none" href="formlulairemodif.php">Votre Compte</a></li>
                </ul>
            </nav>
            <header>
                <h1>Informations de paiement</h1>
            </header>

            <main>
                <div class="parent">
                    <div class="form">
                        <form method="post">

                            <div class="form-dropdown">
                                <label for="typecarte">Mode de paiement:</label>
                                <select id="typecarte" name="typecarte" class="send">
                                    <option value=NULL></option>
                                    <option value="Mastercard">Mastercard</option>
                                    <option value="Visa">Visa</option>
                                    <option value="Amex">Amex</option>
                                </select>
                            </div>
                            <br>

                            <div class="form-line">
                                <input class="input" type="number" name="numcarte" placeholder="numcarte" required>
                            </div>
                            <br>

                            <div class="form-line">
                                <input class="input" type="text" name="nomdeCarte" placeholder="nomdeCarte" required>
                            </div>
                            <br>

                            <div class="form-line">
                                <input class="input" type="month" name="DateFIN" placeholder="DateFIN" min="2023-06" max="2058-12" required>
                            </div>
                            <br>


                            <div class="form-line">
                                <input class="input" type="number" min=0 name="securite" placeholder="securite" required>
                            </div>
                            <br>

                            <input class="send" type="submit" name="register-form" value="Terminer" onclick="showAlert()">
                            <br>
                        </form>

                    </div>

                </div>
                <br><br>
            <p></p>
                
            </main>

            <footer>
                <h><a href="AboutUs.php">About us </a>| Credit | ce que tu veux | blablabla</h>
            </footer>


        </div>
        
        <?php formCarte(); ?>
    </body>
</html>


<?php
function formCarte() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //information de paiement
        $typecarte = $_POST['typecarte'];
        $numcarte = $_POST['numcarte'];
        $nomdeCarte = $_POST['nomdeCarte'];
        $DateFIN =$_POST['DateFIN']; 
        $securite  =$_POST['securite']; 


        $prepare = Connection::$db->prepare("INSERT INTO moy_paiement(num_carte ,type_carte, nom_carte, date_exp, securite) VALUES (?, ?, ?, ?, ?)");
        $prepare->execute(array($numcarte ,$typecarte, $nomdeCarte, $DateFIN, $securite));

        $idchangement = Connection::$db->lastInsertId();

        $prepare = Connection::$db->prepare("UPDATE user SET id_moy_paiement = ? WHERE id_user = ?");
        $prepare->execute(array($idchangement ,$_SESSION['user']));

        echo '<script>window.location.href = "../index.php";</script>';

?>
<script>
        function showAlert() {
            alert("Vos informations ont bien été enregistrées");
        }
</script>

<?php
    }
}
?>
