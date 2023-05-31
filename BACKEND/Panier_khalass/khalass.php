<?php

include "../Controller.php";

function paiement() {
  ?>
  <form method="POST">
    <div class="form-dropdown">
      <label for="paymode">Mode de paiement:</label>
      <select id="paymode" name="paymode">
        <option value=NULL>haha</option>
        <option value="Mastercard">Mastercard</option>
        <option value="Visa">Visa</option>
        <option value="Amex">Amex</option>
      </select>
    </div>

    <div class="form-line">
        <label class="big-2" for="numCB">Numéro de carte</label>
        <input class="input" type="number" name="numCB" placeholder="numCB" required>
    </div>

    <div class="form-line">
        <label class="big-2" for="nomCarte">Nom sur la carte</label>
        <input class="input" type="text" name="nomCarte" placeholder="nomCarte" required>
    </div>

    <div class="form-line">
        <label class="big-2" for="DateExp">Date d'expiration</label>
        <input class="input" type="month" name="DateExp" placeholder="DateExp" min="2023-06" max="2058-12" required>
    </div>

    
    <div class="form-line">
        <label class="big-2" for="Crypto">Cryptogramme</label>
        <input class="input" type="number" name="Crypto" placeholder="Crypto" required>
    </div>

    <input type="submit" value="Soumettre">
  </form>
  <?php

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $paymode = $_POST['paymode'];
    $numCB = $_POST['numCB'];
    $nomCarte = $_POST['nomCarte'];
    $DateExp =$_POST['DateExp']; 
    $Crypto  =$_POST['Crypto']; 
    var_dump ("Mode de paiement sélectionné : " . $paymode);
    var_dump ("Numéro de carte : " . $numCB);
    var_dump ("Nom de la carte : " . $nomCarte);
    var_dump ("Date d'expiration : " . $DateExp);
    var_dump ("Cryptogramme : " . $Crypto);

    
  }
}

?>

<!DOCTYPE html>
<html>
  <body>
    <?php
    paiement();
    ?>
  </body>
</html>