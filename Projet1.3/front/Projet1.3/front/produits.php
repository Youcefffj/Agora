<?php
//////////////////////////////////////////////////////
// CELUI QUI TOUCHE A CE FICHIER JE L'ENCLENCHE OK? //
//////////////////////////////////////////////////////
session_start();
include "Basketfct.php";
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Agora Francia - Catégories de produits</title>
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
            <div>
                <header>
                    <h1>Agora Francia</h1>
                    <img src="images/logo.png" alt="logo" class="logo">
                </header>

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


                <section id="resultats">
                    <!-- Ici seront affichés les résultats -->
                </section>


                <section id="resultats">
                    <!-- Ici seront affichés les résultats -->
                </section>


                <main>
                    <?php

                    // //////////////////////////////////////////////////////// //
                    //AFFICHE TOUS LES ITEMS (page défilement avec tous les items)
                    // //////////////////////////////////////////////////////// //

                    include "../Connection.php";

                    Connection::initConnection();

                    $prepare = Connection::$db->prepare("SELECT * FROM item");


                    // Vérifier si le tri par prix est activé
                    if (isset($_GET['sort'])) {
                        if ($_GET['sort'] === 'asc') {
                            $prepare = Connection::$db->prepare("SELECT * FROM item ORDER BY prix ASC");
                        } elseif ($_GET['sort'] === 'desc') {
                            $prepare = Connection::$db->prepare("SELECT * FROM item ORDER BY prix DESC");
                        } elseif ($_GET['sort'] === 'name_asc') {
                            $prepare = Connection::$db->prepare("SELECT * FROM item ORDER BY nom ASC");
                        } elseif ($_GET['sort'] === 'name_desc') {
                            $prepare = Connection::$db->prepare("SELECT * FROM item ORDER BY nom DESC");
                        } elseif ($_GET['sort'] == 'commum') {
                            $prepare = Connection::$db->prepare("SELECT * FROM item WHERE id_categorie = '1'");
                        } elseif ($_GET['sort'] == 'rare') {
                            $prepare = Connection::$db->prepare("SELECT * FROM item WHERE id_categorie = '2'");
                        } elseif ($_GET['sort'] == 'hdg') {
                            $prepare = Connection::$db->prepare("SELECT * FROM item WHERE id_categorie = '3'");
                        }
                    }

                    $prepare->execute();
                    $items = $prepare->fetchAll();

                    // Affichage des liens de tri
                    $sortAscLink = $_SERVER['PHP_SELF'] . '?sort=asc';
                    $sortDescLink = $_SERVER['PHP_SELF'] . '?sort=desc';
                    $sortNameAscLink = $_SERVER['PHP_SELF'] . '?sort=name_asc';
                    $sortNameDescLink = $_SERVER['PHP_SELF'] . '?sort=name_desc';
                    $sortcommum = $_SERVER['PHP_SELF'] . '?sort=commum';
                    $sortrare = $_SERVER['PHP_SELF'] . '?sort=rare';
                    $sorthdg = $_SERVER['PHP_SELF'] . '?sort=hdg';
                    $removeSortLink = $_SERVER['PHP_SELF'];
                    //var_dump($items);
                    if (!isset($_GET['item'])) {

                    ?>
                    <div class="filtre">
                        <div class="boxChoix">
                            <a href="<?= $sortrare; ?>">
                                <button type="submit" class="send" value="rare" id="choix1">rare</button>
                            </a>
                        </div>
                        <div class="boxChoix">
                            <a href="<?= $sorthdg; ?>">
                                <button type="submit" class="send" value="haut de gamme" id="choix2">haut de gamme</button>
                            </a>
                        </div>
                        <div class="boxChoix">
                            <a href="<?= $sortcommum; ?>">
                                <button type="submit" class="send" value="régulier" id="choix3">Commun</button>
                            </a>
                        </div>
                        <div class="boxChoix">
                            <a href="<?= $sortAscLink; ?>">
                                <button type="submit" class="send" value="prix croissant" id="choix6">prix croissant</button>
                            </a>
                        </div>
                        <div class="boxChoix">
                            <a href="<?= $sortDescLink; ?>">
                                <button type="submit" class="send" value="prix décroissant" id="choix7">prix
                                    décroissant</button>
                            </a>
                        </div>
                        <div class="boxChoix">
                            <a href="<?= $sortNameAscLink; ?>">
                                <button type="submit" class="send" value="nom croissant" id="choix8">nom croissant</button>
                            </a>
                        </div>
                        <div class="boxChoix">
                            <a href="<?= $sortNameDescLink; ?>">
                                <button type="submit" class="send" value="nom décroissant" id="choix9">nom décroissant</button>
                            </a>
                        </div>
                        <div class="boxChoix">
                            <a href="<?= $removeSortLink; ?>">
                                <button type="submit" class="send" value="nom décroissant" id="choix9">Sans filtre</button>
                            </a>
                        </div>

                    </div>


                    <?php


                        foreach ($items as $item) {
                    ?>
                    <div class="container2">
                        <div class="cardProduct">
                            <a href="produits.php?item=<?= $item['id_item']; ?>" class="shop-box">
                                <figure>
                                    <img src="<?= $item['photos']; ?>" class="image1">
                                </figure>
                                <p>
                                    <?= $item['nom']; ?>
                                </p>
                                <p>
                                    <?= $item['prix']; ?> €
                                </p>
                            </a>
                        </div>

                    </div>
                    <?php
                        }
                    } else { //un item est selectionné
                        $id = $_GET['item'];
                        //echo $id;
                        $prepare = Connection::$db->prepare("SELECT * FROM item WHERE id_item = ?");
                        $prepare->execute(array($id));
                        $result = $prepare->fetch();
                        $enchere=$result["enchere"];
                        // echo $result['prix'];
                        // echo $result['nom'];
                    ?>
                    <header>
                        <div class="container-fluid d-flex flex-lg-row flex-column justify-content-center align-items-center">
                            <div class="col-lg-4 col-10 trucs">
                                <img src="<?= $result['photos']; ?>" class="imageProd">
                            </div>
                            <div class="col-lg-4 col-10 trucs">
                                <div class="info">
                                    <p class="NDP"><?= $result['nom']; ?></p>
                                    <p class="infoProd"><?= $result['descriptions']; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-4 trucs">
                                <div class="Tools">
                                    <p>Prix : <?= $result['prix']; ?> €</p>
                                    <!-- <p>Prix : <?= $result['prix_enchere']; ?> €</p> -->
                                    <br>
                                    
                                    <div class="tab">
                                        <button class="send" onclick="openTab(event, 'acheter')" <?php if ($enchere == "oui") { echo "disabled"; } ?>>Acheter</button>
                                        <button class="send" onclick="openTab(event, 'negocier')" <?php if ($enchere == "oui") { echo "disabled"; } ?>>Négocier</button>
                                        <button class="send" onclick="openTab(event, 'encherir')" <?php if ($enchere == "non") { echo "disabled"; } ?>>Enchérir</button>
                                        <br>
                                    </div>
                                    <br>
                                    <div id="acheter" class="tabcontent" style="display: none">
                                        <p>Ajouter au panier</p>
                                        <form name="form" method="post">
                                            <label style="font-size: 25px">Quantité :</label>

                                            <input type="number" id="inputId" oninput="desactiverBouton()" name="quantite" value="0" style="width:100px;text-align:center;height:50px" min="0">
                                            <input type="submit" id="boutonId" class="send" value="valider">
                                        </form>
                                    </div>

                                    <div id="negocier" class="tabcontent" style="display: none">
                                        <form name="form" method="post">
                                            <p>Proposer un nouveau prix :</p>
                                            <input type="number" name="negooo" style="width:100px;text-align:center;height:50px" min="1">
                                            <input type="submit" class="send" value="valider">
                                        </form>
                                    </div>

                                    <div id="encherir" class="tabcontent" style="display: none">
                                        <form name="form" method="post">
                                            <p>Enchérir : </p>
                                            <input type="number" name="auction" value=<?= $result['prix_enchere'] + 1; ?> style="width:100px;text-align:center;height:50px" min=<?= $result['prix_enchere'] + 1; ?>>
                                            <input type="submit" class="send" value="valider">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>


                    <br>

                    <p></p>

                    </div>
                <footer>
                    <h><a href="AboutUs.php">À propos de nous</a> | Crédits | Ce que tu veux | Blablabla</h>
                </footer>

            </div>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <?php
                    }
            ?>


            </main>
        <footer>
            <h><a href="AboutUs.php">About us </a>| Credit © | 01 23 45 67 89 | agora@francia.com</h>
        </footer>

        </div>

    </body>

</html>


<script>
    function openTab(evt, actionType) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("send");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(actionType).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function desactiverBouton() {
        var inputValeur = document.getElementById("inputId").value; // Récupérer la valeur du champ de saisie
        var bouton = document.getElementById("boutonId"); // Récupérer le bouton par son ID

        if (parseInt(inputValeur) === 0) {
            bouton.disabled = true; // Désactiver le bouton
        } else {
            bouton.disabled = false; // Activer le bouton
        }
    }

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

<?php
    $prepare = Connection::$db->prepare("SELECT COUNT(*) FROM offre WHERE id_item = ?");
    $prepare->execute(array($id));
    $nbEnchere = $prepare->fetch();
    $nbEnchere = $nbEnchere[0];

    if (isset($_POST['auction'])) {
        encherir();
    }

    if(isset($_POST["quantite"])){
        $quantite = $_POST["quantite"];
        addToBasket($id, $quantite);
        echo "ISSET QUANTITE";
    }

    if(isset($_POST["negooo"])){
        $prixprop=$_POST["negooo"];
        negociation($id, $prixprop);
    }

    function encherir()
    {
        $enchere = $_POST['auction'];
        $user = $_SESSION["user"];
        global $id;
        global $result;

        if ($enchere > $result['prix_enchere']) {
            // CHERCHE LE MEILLEUR ENRICHISSEUR
            $prepare = Connection::$db->prepare("SELECT MAX(prix) FROM offre WHERE id_item = ?");
            $prepare->execute(array($id));
            $resultMaxPrice = $prepare->fetch();
            $resultMaxPrice = $resultMaxPrice[0];
            var_dump($resultMaxPrice);

            // SI MEILLEUR ENRICHISSEUR
            if ($enchere > $resultMaxPrice) {
                $newPrice = $resultMaxPrice + 1;
                echo "MEILLEUR ENRICHISSEUR";
            } else {
                $newPrice = $enchere + 1;
                echo "PAS LE MEILLEUR ENRICHISSEUR";
            }
            // AJOUTE L'ENCHERE DANS LA BDD
            $prepare = Connection::$db->prepare("INSERT INTO offre(id_item ,id_user, prix) VALUES (?, ?, ?)");
            $prepare->execute(array($id, $user, $enchere));
            // MODIFIE LE PRIX DE L'ITEM DANS LA BDD
            $prepare = Connection::$db->prepare("UPDATE item SET prix_enchere = ? WHERE id_item = ?");
            $prepare->execute(array($newPrice, $id));
        }
    }

?>
