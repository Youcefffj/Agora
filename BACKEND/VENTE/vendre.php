<?php

session_start();
include "../Controller.php";
echo $_SESSION['user'];

function SellForm() {
    ?>
    <div class="main-box">
        <h1 class="main-title">FORMULAIRE DE VENTE</h1>
        <form method="post" class="form-seller" enctype="multipart/form-data">

            <div class="form-line">
                <label class="big-2" for="objName">Nom de l'objet</label>
                <input class="input" type="text" name="objName" placeholder="objName" required>
            </div>

            <div class="form-line">
                <label class="big-2" for="description">Description du produit</label>
                <input class="input-large" type="text" name="description" placeholder="description" required>
            </div>

            <div class="form-line">
                <label class="big-2" for="prix">Prix</label>
                <input class="input-large" type="number" name="prix"placeholder="prix" required>
            </div>

            <input type="radio" name="enchereouuuu" value="enchere"> enchère
            <input type="radio" name="enchereouuuu" value="pasenchere"> pas enchère



            <div class="form-line">
                <label class="big-2" for="photo">Photo</label>
                <input type="file" name="photo" accept="image/*">
            </div>

            <div class="form-line">
                <label class="big-2" for="video">Video du produit</label>
                <input type="file" name="video" accept="video/*" >
            </div>


            <div class="form-dropdown">
                <label for="categorie">Catégorie de l'article:</label>
                <select id="categorie" name="typecarte">
                    <option value=commum>Commum</option>
                    <option value="rare">Rare</option>
                    <option value="haut">Haut De Gamme</option>
                    <!-- ils croient c'est des pokemons ouuuuuuuuuuuuuuuuuuuuu -->
                    <!-- chui KO il est 2h du sbah jv glisser un billet à ramdane cherif il va nous donner 20 -->
                </select>
            </div>

            <input class="blue-button" type="submit" name="VEDRE" value="ZE VENDS">
        </form>

    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifier si le formulaire a été soumis

        // Récupérer les valeurs soumises
        $nomObj = $_POST['objName'];
        $descriptionObj = $_POST['description'];
        $prixObj = $_POST['prix'];
        $enchereObj = $_POST['enchereouuuu'];
        $photoObj = $_FILES['photo']['tmp_name'];
        $videoObj = !empty($_FILES['video']['tmp_name']) ? $_FILES['video']['tmp_name'] : NULL; 
        $categObj = $_POST['categ'];

        
        // Définir l'emplacement de destination pour l'image
        $destination = '../image/image'.rand(0,10000000).'.jpg';
        $videoDestination = '../video/video'.rand(0,10000000).'.mp4';
        // Déplacer le fichier image vers l'emplacement de destination
        move_uploaded_file($photoObj, $destination);

        if (!empty($videoObj)) {
            move_uploaded_file($videoObj, $videoDestination);
        }
                
        // Préparer et exécuter la requête d'insertion
        $prepare = Connection::$db->prepare("INSERT INTO item(nom ,photos, descriptions, video, prix, id_categorie, maniere, id_vendeur)VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $prepare->execute(array($nomObj ,$destination, $descriptionObj, $videoObj,$prixObj, $categObj, $enchereObj, $_SESSION['user']));   

    }

    
}

?>








<!DOCTYPE html>
<html>
    <body>
        <?php
            SellForm();
            //formConnection();
        ?>
    </body>
</html>
