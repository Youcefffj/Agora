<?php
// //////////////////////////////////////////////////////// //
//AFFICHE TOUS LES ITEMS (page défilement avec tous les items)
// //////////////////////////////////////////////////////// //

include "../Connection.php";

session_start();
echo $_SESSION['user'];

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
    }
}

$prepare->execute();
$items = $prepare->fetchAll();

// Affichage des liens de tri
$sortAscLink = $_SERVER['PHP_SELF'] . '?sort=asc';
$sortDescLink = $_SERVER['PHP_SELF'] . '?sort=desc';
$sortNameAscLink = $_SERVER['PHP_SELF'] . '?sort=name_asc';
$sortNameDescLink = $_SERVER['PHP_SELF'] . '?sort=name_desc';
$removeSortLink = $_SERVER['PHP_SELF'];


if (!isset($_GET['item'])) {

    ?>
    <a href="<?=$sortAscLink;?>">Trier par ordre croissant de prix</a>
    <a href="<?=$sortDescLink;?>">Trier par ordre décroissant de prix</a>
    <a href="<?=$sortNameAscLink;?>">Trier par ordre alphabétique (noms) croissant</a>
    <a href="<?=$sortNameDescLink;?>">Trier par ordre alphabétique (noms) décroissant</a>
    <a href="<?=$removeSortLink;?>">Enlever le tri</a>
    <?php
    foreach ($items as $item) {
        ?>
        <div class="container">
            <div class="card">
                <a href="toutitems.php?item=<?=$item['id_item'];?>" class="shop-box">
                    <h1 class="blue"><?=$item['nom'];?></h1>
                    <figure>
                        <img src="<?=$item['photos'];?>" class="image1">
                    </figure>
                    <p><?=$item['descriptions'];?></p>
                    <strong class="blue-button-small">Clique ici</strong>
                </a>
            </div>
        </div>
        <?php
    }
} else {
    $id = $_GET['item'];
    var_dump($id);
    // Afficher page descriptif de l'objet avec SELECT.....
    // Prix...
    // Appel fonction AjtAuPanier
}

?>
