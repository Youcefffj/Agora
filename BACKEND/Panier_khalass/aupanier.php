<?php

session_start();
include "../Controller.php";



function getCategories() {
    $prepare = Connection::$db->prepare("SELECT * FROM categorie;");
    $prepare->execute(array());

    $prepare = $prepare->fetchAll();
    return $prepare;
}

function getItems($category_id) {
    $prepare = Connection::$db->prepare("SELECT * FROM item NATURAL JOIN categorie WHERE id_categorie = ?;");
    $prepare->execute(array($category_id));

    $prepare = $prepare->fetchAll();
    return $prepare;
}

function getItem($item_id) {
    $prepare = Connection::$db->prepare("SELECT * FROM item NATURAL JOIN categorie WHERE id_item = ?;");
    $prepare->execute(array($item_id));

    $prepare = $prepare->fetch();
    return $prepare;
}


  
function addToBasket($item_id) {
          // Récupérer les informations de l'élément à partir de la base de données
    $item = getItem($item_id);

    // Effectuer les opérations d'ajout au panier
    $quantite = 1;
    $user = $_SESSION['user']; // Exemple de l'identifiant de l'utilisateur, à remplacer par votre propre logique
    $item_nom = $item['nom']; // Exemple : récupérer le nom de l'élément à partir des informations récupérées

    $prepare = Connection::$db->prepare("INSERT INTO panier(id_item, id_user, quantite) VALUES (?,?,?)");
    $prepare->execute(array($item_id, $user, $quantite));

      echo'Produit ajouté au panier';

    if (isset($_POST['basket'])) {
        $item_id = $_POST['item_id'];
        addToBasket($item_id);
        echo 'bouton cliquééééééé';
        unset($_POST['basket']);
    }
}







    function ShowBasket() {
        // Récupérer les informations du panier de l'utilisateur connecté
        $user = $_SESSION['user']; // Exemple de l'identifiant de l'utilisateur, à remplacer par votre propre logique
        $prepare = Connection::$db->prepare("SELECT * FROM panier WHERE id_user = ?");
        $prepare->execute(array($user));
        $basketItems = $prepare->fetchAll();
    
        // Afficher le contenu du panier
        if (count($basketItems) > 0) {
            echo "<h2>Contenu du panier :</h2>";
            echo "<ul>";
            foreach ($basketItems as $item) {
                echo "<li>" . $item['nom'] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "Le panier est vide.";
        }
    }
?>

<!DOCTYPE html>
<html>
    <body>

    <form id="basketForm" method="post">
        <div class="boutonajt">
            <button type="submit" name="basket">AJOUTER</button>
            <!-- <button id="AddToBasket(3)" name="basket">Ajouter au panier</button> -->
            <!-- <input type="hidden" name="item_id" value="1"> Remplacez "123" par l'identifiant unique de l'élément -->
        </div>
    </form>
    

    </body>
</html>

