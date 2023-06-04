<?php

include "../Connection.php";

session_start();

Connection::initConnection();

if (isset($_POST['itemId'])) {
    $itemId = $_POST['itemId'];
    deletefrombasket($itemId);
    echo "Article supprimé du panier avec succès.";
} else {
    echo "Erreur : l'identifiant de l'article n'a pas été spécifié.";
}

?>