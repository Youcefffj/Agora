<?php

//////////////////////////////////////////////
///**********NE PAS MODIFIER***************///
//////////////////////////////////////////////


session_start();
include "../Controller.php";

?>

<!DOCTYPE html>
<html>

<head>
    <title>Agora Francia - Site de e-commerce</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="Website icon" type="png" href="images/logo.png">

</head>

<?php
function SellForm()
{

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nomObj = $_POST['objName'];
        $descriptionObj = $_POST['description'];
        $prixObj = $_POST['prix'];
        // $enchereObj = $_POST['enchereouuuu'];
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

        $prepare = Connection::$db->prepare("INSERT INTO item(nom ,photos, descriptions, video, prix, id_categorie)VALUES (?, ?, ?, ?, ?, ?)");
        $prepare->execute(array($nomObj, $destination, $descriptionObj, $videoDestination, $prixObj, $categObj));

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
                <li><a style="color:black;text-decoration:none" href="panier.php">Panier</a></li>
                <li><a style="color:black;text-decoration:none" href="formlulairemodif.php">Votre Compte</a></li>
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
                        <input value="Enchere" name="enchereouuuu" type="radio">
                        <span class="radio"></span>
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
    ?>
</body>

</html>