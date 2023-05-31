<?php

include "../Controller.php";

function getItem($item_id){
    $prepare = self::$db->prepare("SELECT * FROM item NATURAL JOIN categorie WHERE id_item = ?;");
    $prepare->execute(array($item_id));

    $prepare = $prepare->fetch();
    return $prepare;
}


function Addtobasket($item_id){
?>
<form  method="post">
    <div class=Ajouter>
        <input type="submit" name="basket" value="Add to basket">
    </div>

    <div class=iditem>
        <input type="number" name="item" hidden>
    </div>

    <div class=quantite>
        <input type="number" name="quantite">
    </div>
</form>
<?php

echo 'hahdqlkfka';

if(isset($_POST['basket'])){ //boutton cliqué
    echo 'haha';
    $quantite=3;
    //$quantite=$_POST["quantite"];
    // $user = $_SESSION['user'];
    $user = 5;
    $item= $_POST["item"];
    //$item= 1;
    
    $prepare = Connection::$db->prepare("INSERT INTO panier(item, user, quantite)VALUES(?,?,?)");
    $prepare->execute(array($item, $user, $quantite));
}
}



function showbasket(){

}
?>

<!DOCTYPE html>
<html>
    <body>
        <?php
            Addtobasket();
            //formConnection();
        ?>
    </body>
</html>