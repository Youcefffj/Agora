<?php

// //////////////////////////////////////////////////////// //
//AFFICHE TOUS LES ITEMS (page défilement avec tous les items)
// //////////////////////////////////////////////////////// //

include "../Connection.php";

session_start();
echo $_SESSION['user'] ;

Connection::initConnection();

$prepare = Connection::$db->prepare("SELECT * FROM item");
$prepare->execute(array());

$items = $prepare->fetchAll();//obligatoire quand tu fais select
//var_dump($items);
if (!isset($_GET['item'])){
    echo 'haha';
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
}
else{ //un item est selectionné
    $id=$_GET['item'];
    var_dump($id);
    //affiche page descriptif de objet avec SELECT.....
    //prix...
    //appel fonction AjtAuPanier
}
?>
