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
                    <li><a style="color:black;text-decoration:none" href="index.php">Accueil</a></li>
                    <li><a style="color:black;text-decoration:none" href="produits.php">Tout parcourir</a></li>
                    <li><a style="color:black;text-decoration:none" href="notifications.php">Notifications</a></li>
                    <li><a style="color:black;text-decoration:none" href="#">Panier</a></li>
                    <li><a style="color:black;text-decoration:none" href="formlulairemodif.php">Votre Compte</a></li>
                </ul>
            </nav>
            <div class="filtre">
                <div class="boxChoix">
                    <input type="radio" value="rare" id="choix1" name="type">
                    <label for="rare">rare</label>
                </div>
                <div class="boxChoix">
                    <input type="radio" value="haut de gamme" id="choix2" name="type">
                    <label for="haut de gamme">haut de gamme</label>
                </div>
                <div class="boxChoix">
                    <input type="radio" value="régulier" id="choix3" name="type">
                    <label for="régulier">régulier</label>

                </div>
                <div class="boxChoix">
                    <input type="radio" value="prix" id="choix4" name="type">
                    <label for="prix">prix</label>

                </div >
                <div class="boxChoix">
                    <input type="radio" value="nom" od="choix5" name="type">
                    <label for="nom">nom</label>

                </div> 
            </div>

            <main>
                <?php

                // //////////////////////////////////////////////////////// //
                //AFFICHE TOUS LES ITEMS (page défilement avec tous les items)
                // //////////////////////////////////////////////////////// //

                include "Connection.php";

                Connection::initConnection();

                $prepare = Connection::$db->prepare("SELECT * FROM item");
                $prepare->execute(array());

                $items = $prepare->fetchAll();//obligatoire quand tu fais select
                //var_dump($items);
                if (!isset($_GET['item'])){
                    foreach ($items as $item) {
                ?>


                <div class="container2">
                    <div class="cardProduct">
                        <a href="toutitems.php?item=<?=$item['id_item'];?>" class="shop-box">
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