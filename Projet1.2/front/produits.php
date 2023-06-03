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
                                    <img src="<?=$item['photos'];?>" class="image1">
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
                // echo $result['prix'];
                // echo $result['nom'];
                ?>
                <header>
                    <div class="container-fluid d-flex flex-lg-row flex-column justify-content-center align-items-center">
                        <div class="col-lg-4 col-10 trucs">
                            <img src="<?=$result['photos'];?>" class="imageProd">
                        </div>
                        <div class="col-lg-4 col-10 trucs">
                            <div class="info">
                                <p class="NDP"><?=$result['nom'];?></p>
                                <p class="infoProd"><?=$result['descriptions'];?></p>
                            </div>
                        </div>
                        <div class="col-lg-4 trucs">
                            <div class="Tools">
                                <p>Prix : <?=$result['prix'];?> €</p>
                                <label style="font-size: 25px">Quantité :</label>
                                <input type="number" value="quantite" style="width:100px;text-align:center;height:50px"
                                    min="0">
                                <br>
                                <button class="send"> Add to Card </button>
                                <button class="send"> Négocier </button>
                                <button class="send"> Enchère </button>
                                <br>

                            </div>
                        </div>
                    </div>
                </header>

                <main>

                </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
        <?php
            }
            ?>
    </main>

    <footer>
        <h><a href="AboutUs.php">À propos de nous</a> | Crédits | Ce que tu veux | Blablabla</h>
    </footer>
    </div>
</body>

</html>