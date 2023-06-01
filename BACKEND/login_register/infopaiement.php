<?php

session_start();

include "../Controller.php";

echo $_SESSION['user'] ;

function formCarte() {
    ?>
    <div class="parent">
        <h1 class="main-title">Inscription</h1>
        <form method="post" class="form-connection">

            <!-- paiement -->

            <div class="form-dropdown">
                <label for="typecarte">Mode de paiement:</label>
                <select id="typecarte" name="typecarte">
                    <option value=NULL>haha</option>
                    <option value="Mastercard">Mastercard</option>
                    <option value="Visa">Visa</option>
                    <option value="Amex">Amex</option>
                </select>
            </div>

            <div class="form-line">
                <label class="big-2" for="numcarte">Numéro de carte</label>
                <input class="input" type="number" name="numcarte" placeholder="numcarte" required>
            </div>

            <div class="form-line">
                <label class="big-2" for="nomdeCarte">Nom sur la carte</label>
                <input class="input" type="text" name="nomdeCarte" placeholder="nomdeCarte" required>
            </div>

            <div class="form-line">
                <label class="big-2" for="DateFIN">Date d'expiration</label>
                <input class="input" type="month" name="DateFIN" placeholder="DateFIN" min="2023-06" max="2058-12" required>
            </div>

            
            <div class="form-line">
                <label class="big-2" for="securite">Cryptogramme</label>
                <input class="input" type="number" name="securite" placeholder="securite" required>
            </div>

            <input class="blue-button" type="submit" name="register-form" value="Terminer">

        </form>
    
        <p class="big-1">
            Déjà inscrits ? Clique <a class="blue-button-small" href="index.php?module=connection&action=connect">ici</a>.
        </p>
    </div>

    <?php
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


    }
}
    ?>

<!DOCTYPE html>
<html>
    <body>
        <?php
            formCarte();
        ?>
    </body>
</html>