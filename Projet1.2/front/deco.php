<?php

function deconnexion() {
    // Supprimer toutes les variables de session
    session_unset();

    // Détruire la session
    session_destroy();
    echo "Vous êtes déconnecté.";
    echo '<script>window.location.href = "../index.php";</script>';
}
?>