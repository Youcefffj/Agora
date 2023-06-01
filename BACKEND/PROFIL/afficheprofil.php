<?php

session_start();
include "../Connection.php";
include "../Controller.php";

echo $_SESSION['user'] ;

$profil = $_SESSION['user'];

function ShowProfile(){

  $prepare = Connection::$db->prepare("SELECT * FROM user WHERE id_user = ?");
  $prepare->execute(array($_SESSION['user']));
  $show = $prepare->fetch();
  echo $show['pseudo'];
  echo $show['email'];
  echo $show['nom'];
  echo $show['prenom'];
  //echo $show['image'];

  $prepare = Connection::$db->prepare("SELECT * FROM adresse WHERE id_adr = ?");
  $prepare->execute(array($show['id_adr']));
  $showadr = $prepare->fetch();

  echo $showadr['adresse_ligne1'];
  echo $showadr['adresse_ligne2'];
  echo $showadr['ville'];
  echo $showadr['code_postal'];
  echo $showadr['pays'];
  echo $show['photo']
  ?>

<figure>
  <img src="<?=$show['photo'];?>" class="image1">
</figure>

<?php

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

