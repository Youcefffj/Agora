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
    </head>
    <body>
        <div class="wrapper">
            <header>
                <h1>Agora Francia</h1>
                <img src="images/logo.png" alt="logo" class="logo">
            </header>

            <nav>
                <ul class="list">
                    <li><a style="color:black;text-decoration:none" href="../index.php">Accueil</a></li>
                    <li><a style="color:black;text-decoration:none" href="produits.php">Tout parcourir</a></li>
                    <li><a style="color:black;text-decoration:none" href="notifications.php">Notifications</a></li>
                    <li><a style="color:black;text-decoration:none" href="panier.php">Panier</a></li>
                    <li><a style="color:black;text-decoration:none" href="formlulairemodif.php">Votre Compte</a></li>
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
                    } 
                    elseif ($_GET['sort'] === 'desc') {
                        $prepare = Connection::$db->prepare("SELECT * FROM item ORDER BY prix DESC");
                    } 
                    elseif ($_GET['sort'] === 'name_asc') {
                        $prepare = Connection::$db->prepare("SELECT * FROM item ORDER BY nom ASC");
                    } 
                    elseif ($_GET['sort'] === 'name_desc') {
                        $prepare = Connection::$db->prepare("SELECT * FROM item ORDER BY nom DESC");
                    }
                    elseif ($_GET['sort']== 'commum'){
                        $prepare = Connection::$db->prepare("SELECT * FROM item WHERE id_categorie = '1'");
                    }
                    elseif ($_GET['sort']== 'rare'){
                        $prepare = Connection::$db->prepare("SELECT * FROM item WHERE id_categorie = '2'");
                    }
                    elseif ($_GET['sort']== 'hdg'){
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
                $sortrare = $_SERVER['PHP_SELF']. '?sort=rare';
                $sorthdg = $_SERVER['PHP_SELF']. '?sort=hdg';
                $removeSortLink = $_SERVER['PHP_SELF'];
                //var_dump($items);
                if (!isset($_GET['item'])){
                    
                ?>
                <div class="filtre">
    <div class="boxChoix">
    <a href="<?=$sortrare;?>">
        <button type="submit" class="send" value="rare" id="choix1">rare</button>
    </a>
    </div>
    <div class="boxChoix">
    <a href="<?=$sorthdg;?>">
        <button type="submit" class="send" value="haut de gamme" id="choix2">haut de gamme</button>
    </a>
    </div>
    <div class="boxChoix">
    <a href="<?=$sortcommum;?>">
        <button type="submit" class="send" value="régulier" id="choix3">Commun</button>
        </a>
    </div>
    <div class="boxChoix">
        <a href="<?=$sortAscLink;?>">
        <button type="submit" class="send" value="prix croissant" id="choix6">prix croissant</button>
        </a>
    </div>
    <div class="boxChoix">
        <a href="<?=$sortDescLink;?>">
        <button type="submit" class="send" value="prix décroissant" id="choix7">prix décroissant</button>
        </a>
    </div>
    <div class="boxChoix">
        <a href="<?=$sortNameAscLink;?>">
        <button type="submit" class="send" value="nom croissant" id="choix8">nom croissant</button>
        </a>
    </div>
    <div class="boxChoix">
    <a href="<?=$sortNameDescLink;?>">
        <button type="submit" class="send" value="nom décroissant" id="choix9">nom décroissant</button>
    </a>
    </div>
    <div class="boxChoix">
    <a href="<?=$removeSortLink;?>">
        <button type="submit" class="send" value="nom décroissant" id="choix9">Sans filtre</button>
    </a>
    </div>
    
</div>
            

                <?php


foreach ($items as $item) {
    ?>
                <div class="container2">
                    <div class="cardProduct">
                        <a href="produits.php?item=<?=$item['id_item'];?>" class="shop-box">
                            <figure>
                                <img src="<?=$item['photos'];?>" class="image1">
                            </figure>
                            <p><?=$item['nom'];?></p>
                            <p><?=$item['prix'];?> €</p>
                        </a>
                    </div>

                </div>            
                <?php
                    }
                }
                else{ //un item est selectionné
                    $id=$_GET['item'];
                    var_dump($id);
                    //affiche page descriptif de objet avec SELECT.....
                    //prix...
                    //appel fonction AjtAuPanier
                }
                ?>
            </main>

            <footer>
                <h><a href="AboutUs.php">À propos de nous</a> | Crédits | Ce que tu veux | Blablabla</h>
            </footer>
        </div>
    </body>
</html>


