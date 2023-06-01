<?php

session_start();
include "../Connection.php";

echo $_SESSION['user'] ;

$profil = $_SESSION['user'];

function ShowProfile($profil){

    $prepare = Connection::$db->prepare("SELECT photo, pseudo, `status`, nom, prenom, email, adr FROM item");
    $prepare->execute(array());
    $result = $prepare->fetchAll();

}



?>

<!DOCTYPE html>
<html>
  <body>
    <?php
    ShowProfile();
    ?>
  </body>
</html>

