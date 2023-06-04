<?php

// //////////////////////////////////////////////////////// //
//          AFFICHE TOUS LES ITEMS du panier                //
// //////////////////////////////////////////////////////// //

include "../Connection.php";
include "Basketfct.php";

session_start();
// echo $_SESSION['user'];

Connection::initConnection();

if (isset($_POST['itemId'])) {
    $itemId = $_POST['itemId'];
    deletefrombasket($itemId);
}

$prepare = Connection::$db->prepare("SELECT item.id_item, item.nom, item.prix, item.photos, item.descriptions, quantite FROM panier 
                                    JOIN item ON panier.id_item = item.id_item WHERE panier.id_user =?");
$prepare->execute(array($_SESSION['user']));
$paniers = $prepare->fetchAll();


//afficher les produits en negociation//
$prepare = Connection::$db->prepare("SELECT item.id_item, item.nom, nego.prix AS prix_nego, item.photos, item.descriptions
                                    FROM nego
                                    JOIN item ON nego.id_item = item.id_item
                                    WHERE nego.id_user = ?");
$prepare->execute(array($_SESSION['user']));
$negos = $prepare->fetchAll();
$tot = 0;
$total=0;

?>


<!DOCTYPE html>
<html>

    <head>
        <title>Agora Francia - Site de e-commerce</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="Website icon" type="png" href="images/logo.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
            <section>
                <h1 class="titre"> Mon panier</h1>
                <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-center">
                    <div class="col-lg-8 col-12 fond_panier taille_panier my-5 order-lg-1 order-2">
                        <?php
                        foreach ($paniers as $panier) {
                        ?>
                        <div class="col-sm-12 fond_articles my-3">
                            <div class="container-fluid d-flex flex-column flex-md-row align-items-center">
                                <div class="col-xl-4 col-lg-3 col-8 col-sm-6 col-md-4 marge_articles_panier ">
                                    <img src="<?= $panier['photos']; ?>" class="image1">
                                </div>
                                <div class="col-xl-6 col_sm-8 marge_articles_panier">
                                    <div class="nom_objet" style="font-size: 30px;">
                                        <?= $panier['nom']; ?>
                                    </div>
                                    <div class="d-flex align-items-center" style="margin-top:15px">
                                        <span class="mr-2" style="font-size: 20px;">Quantité:</span>
                                        <div class="send_quantite_panier">
                                            <?= $panier['quantite']; ?>
                                        </div>
                                        <button name="haha" class="send supprimer_panier" onclick="deleteItem(<?= $panier['id_item']; ?>)">Supprimer</button>
                                    </div>
                                </div>
                                <div class="col-sm-2 marge_articles_panier">
                                    Prix: <?= $panier['prix'] * $panier['quantite']; ?> €
                                </div>
                            </div>
                        </div>
                        <?php
                            $tot = $tot + $panier['prix'] * $panier['quantite'];
                        }
                        ?>

<?php
                        foreach ($negos as $nego) {
                        ?>
                        <div class="col-sm-12 fond_articles my-3"> 
                            <div class="container-fluid d-flex flex-column flex-md-row align-items-center">
                                <div class="col-xl-4 col-lg-3 col-8 col-sm-6 col-md-4 marge_articles_panier ">
                                    <img src="<?= $nego['photos']; ?>" class="image1">
                                </div>
                                <div class="col-xl-6 col_sm-8 marge_articles_panier">
                                    <div class="nom_objet" style="font-size: 30px;">
                                        <?= $nego['nom']; ?> 
                                    </div>
                                    <div class="d-flex align-items-center" style="margin-top:15px">
                                        <span class="mr-2" style="font-size: 20px;">Quantité:</span>
                                        <div class="send_quantite_panier">
                                            <?= 1 ?>
                                        </div>
                                        <button name="haha" class="send supprimer_panier" onclick="deleteItem(<?= $nego['id_item']; ?>)">Supprimer</button>
                                    </div>
                                </div>
                                <div class="col-sm-2 marge_articles_panier">
                                    Prix: <?= $nego['prix_nego']; ?> € (Negociation)
                                </div>
                            </div>
                        </div>
                        <?php
                            $total = $total + $nego['prix_nego'];
                        }
                        ?>

                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-8 col-10 panier_acheter fond_panier mt-5 mb-5 mb-lg-0 order-lg-2 order-1">
                        <div class="py-4">
                            <p>Prix total: <?= $tot+$total; ?> €</p>
                            <p>Vous Payez: <?= $tot; ?> €</p>
                            <a href="./paiement.php"><button class="send mt-4">Payer</button></a>
                        </div>

                    </div>
                </div>
            </section>
            <footer>
                <h><a href="AboutUs.php">About us </a>| Credit © | 01 23 45 67 89 | agora@francia.com</h>
            </footer>
        </div>

        <script>
            function deleteItem(itemId) {
                // Envoyer une requête AJAX pour supprimer l'article du panier
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'panier.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Réponse du serveur après la suppression
                        console.log(xhr.responseText);
                        // Actualiser la page ou effectuer d'autres actions si nécessaire
                        window.location.reload(); // Actualise la page après la suppression
                    }
                };
                xhr.send('itemId=' + itemId);
            }
        </script>
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
