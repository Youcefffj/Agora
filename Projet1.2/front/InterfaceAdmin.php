<?php

// //////////////////////////////////////////////////////// //
// ------------------NE PAS MODIFIER----------------------- //
// //////////////////////////////////////////////////////// //

include "../Connection.php";

session_start();
//echo $_SESSION['user'];

Connection::initConnection();

//
$prepare = Connection::$db->prepare("SELECT * FROM user WHERE `status` != 'admin' ");
$prepare->execute(array());
$usersupp = $prepare->fetchAll(); //obligatoire quand tu fais select

$prepare = Connection::$db->prepare("SELECT * FROM item");
$prepare->execute(array());
$itemsupp = $prepare->fetchAll(); //obligatoire quand tu fais select

$prepare = Connection::$db->prepare("SELECT * FROM user WHERE `status` = 'acheteur'");
$prepare->execute(array());
$promusers = $prepare->fetchAll(); //obligatoire quand tu fais select

?>

<!DOCTYPE html>
<html>

<head>
    <title>Agora Francia - Catégories de produits</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="Website icon" type="png" href="images/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class=wrapper2>
        <header>

            <p class="titre_admin">Interface Administrateur</p>

        </header>
        <main>
            <div class="parent">
                <div class="infoAdmin">
                    <p>Admin :</p>
                    <p>Numero :</p>

                </div>
            </div>
            <div class="parent">
                <div class="chooseUrChamp">
                    <form method="post">

                        <label for="User">selectionner un utilisateur à supprimer </label>
                        <select name="suppuser" id="User">
                            <option value="NULL"></option>


                            <?php
                            var_dump($usersupp);
                            foreach ($usersupp as $user) {
                            ?>
                                <option value="<?= $user['id_user']; ?>"><?= $user['pseudo']; ?></option>
                            <?php
                            }
                            ?>
                        </select>

                        <br><br>

                        <label for="Item">selectionner un item à supprimer </label>
                        <select name="suppitem" id="User">
                            <option value="NULL"></option>


                            <?php
                            var_dump($itemsupp);
                            foreach ($itemsupp as $item) {
                            ?>
                                <option value="<?= $item['id_item']; ?>"><?= $item['nom']; ?></option>
                            <?php
                            }
                            ?>
                        </select>

                        <br><br>

                        <label for="Item">selectionner un acheteur à promouvoir </label>
                        <select name="promuser" id="User">
                            <option value="NULL"></option>


                            <?php
                            var_dump($promusers);
                            foreach ($promusers as $promuser) {
                            ?>
                                <option value="<?= $promuser['id_user']; ?>"><?= $promuser['pseudo']; ?></option>
                            <?php
                            }
                            ?>
                        </select>

                        <br><br>

                        <input type="submit" id="capart" value="confirmer">
                    </form>
                </div>
            </div>

            <br><br>
            <p></p>

        </main>
    </div>
    <?php
    HACKER();
    ?>
</body>

</html>

<?php

function HACKER()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $supprU = $_POST["suppuser"];
        $supprI = $_POST["suppitem"];
        $promU = $_POST["promuser"];


        $prepare = Connection::$db->prepare("DELETE FROM user WHERE id_user = ?");
        $prepare->execute(array($supprU));

        $prepare = Connection::$db->prepare("DELETE FROM item WHERE id_item = ?");
        $prepare->execute(array($supprI));

        $prepare = Connection::$db->prepare("UPDATE user SET `status` = ? WHERE id_user = ?");
        $prepare->execute(array("vendeur", $promU));

    }
}
?>