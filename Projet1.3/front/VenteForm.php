<?php

//////////////////////////////////////////////
///**********NE PAS MODIFIER***************///
//////////////////////////////////////////////

session_start();
include "../Controller.php";
//echo $_SESSION["user"];

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Agora Francia - Site de e-commerce</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="Website icon" type="png" href="images/logo.png">
        <script src="script.js"></script>

    </head>

    <?php
    function SellForm()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nomObj = $_POST['objName'];
            $descriptionObj = $_POST['description'];
            $prixObj = $_POST['prix'];
            $photoObj = $_FILES['photo']['tmp_name'];
            $videoObj = !empty($_FILES['video']['tmp_name']) ? $_FILES['video']['tmp_name'] : NULL;
            $categObj = $_POST['categ'];

            // DONNER NOM UNIQUE
            $destination = 'images/image' . rand(0, 10000000) . '.jpg';


            // ->DOSSIER ENREGISTREMENT
            move_uploaded_file($photoObj, $destination);
            $videoDestination = NULL;
            if (!empty($videoObj)) { //Valeure initiale = NULL
                $videoDestination = 'videos/video' . rand(0, 10000000) . '.mp4';
                move_uploaded_file($videoObj, $videoDestination);
            }

            if (isset($_POST['enchereouuuu'])) {
                $enchereObj = "oui";
                $prixEnchereObj = $prixObj;
            } else {
                $enchereObj = "non";
                $prixEnchereObj = NULL;
            }
        
            // Reste du code...
        
            $prepare = Connection::$db->prepare("INSERT INTO item(nom, photos, descriptions, video, prix, id_categorie, vendeur, enchere, prix_enchere, date_publi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
            $prepare->execute(array($nomObj, $destination, $descriptionObj, $videoDestination, $prixObj, $categObj, $_SESSION["user"], $enchereObj, $prixEnchereObj));



        }

    }

    ?>

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
                <h1>La Vente</h1>
            </header>

            <main>
                <div class="parent">
                    <form class="form" method="post" enctype="multipart/form-data">
                        <br><br>
                        <input type="text" name="objName" class="input" placeholder="Nom :" Required>
                        <br><br>
                        <input type="number" name="prix" class="input" placeholder="Prix: " Required>
                        <br><br>
                        <textarea cols="20" name="description" rows="10" class="input" required></textarea>
                        <br><br>
                        <label class="radio-button">
                            <input value="oui" name="enchereouuuu" type="checkbox">
                            Enchère
                        </label>
                        <br><br>
                        <p>Photo :</p>
                        <input class="input" type="file" name="photo" accept="images/*" required>
                        <br><br>
                        <p>video :</p>
                        <input class="input" type="file" name="video" accept="video/*">
                        <br><br>
                        <p>Catégorie :</p>


                        <select name="categ" class="input">
                            <option value="1">commun</option>
                            <option value="2">rare</option>
                            <option value="3">haut de gamme</option>

                        </select>
                        <br><br>

                        <input type="submit" class="send" placeholder="Envoyer" name="register-form">
                        <br><br>

                    </form>
                </div>

            </main>
            <footer>
                <h><a href="AboutUs.php">About us </a>| Credit | ce que tu veux | blablabla</h>
            </footer>
        </div>
        <?php
        SellForm();
        //    echo '<script>window.location.href = "../index.php";</script>';
        ?>
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
