<?php
function addToBasket($id, $quantite)
{

    // Effectuer les opérations d'ajout au panier
    $prepare = Connection::$db->prepare("INSERT INTO panier(id_item, id_user, quantite) VALUES (?,?,?)");
    $prepare->execute(array($id, $_SESSION['user'], $quantite));
?>
    echo '<script>
        window.location.href = "Panier.php";
    </script>';
<?php
}


function dropbasket()
{
    $prepare = Connection::$db->prepare("DELETE FROM panier WHERE id_user = ?");
    $prepare->execute(array($_SESSION['user']));
    echo '<script>window.location.href = "../index.php";</script>';
}

function deletefrombasket($itemId)
{

    // Supprimer un article du panier
        $prepare = Connection::$db->prepare("DELETE FROM panier WHERE id_item = ? AND id_user = ?");
        $prepare->execute(array($itemId, $_SESSION['user']));

        // Répondre avec un message de succès
        echo "Article supprimé du panier avec succès";
}
?>