<?php
function addToBasket($id, $quantite) {

    // Effectuer les opérations d'ajout au panier
    $prepare = Connection::$db->prepare("INSERT INTO panier(id_item, id_user, quantite) VALUES (?,?,?)");
    $prepare->execute(array($id, $_SESSION['user'], $quantite));
    ?>
    echo '<script>window.location.href = "../index.php";</script>';
    <?php
}
?>