<?php

//////////////////////////////////////////////
///*******NE PAS MODIFIER SAUF CSS*********///
//////////////////////////////////////////////

session_start();
include "../Connection.php";
include "../Controller.php";

// echo $_SESSION['user'] ;
$profil = $_SESSION['user'];
$profileData = ShowProfile();
$show = $profileData['show'];
$showadr = $profileData['showadr'];
?>

<?php
function ShowProfile()
{

    $prepare = Connection::$db->prepare("SELECT * FROM user WHERE id_user = ?");
    $prepare->execute(array($_SESSION['user']));
    $show = $prepare->fetch();
    // echo $show['pseudo'];
    // echo $show['email'];
    // echo $show['nom'];
    // echo $show['prenom'];
    // //echo $show['image'];

    $prepare = Connection::$db->prepare("SELECT * FROM adresse WHERE id_adr = ?");
    $prepare->execute(array($show['id_adr']));
    $showadr = $prepare->fetch();

    // echo $showadr['adresse_ligne1'];
    // echo $showadr['adresse_ligne2'];
    // echo $showadr['ville'];
    // echo $showadr['code_postal'];
    // echo $showadr['pays'];
    // echo $show['photo'];

    $profileData = array(
        'show' => $show,
        'showadr' => $showadr
    );

    return $profileData;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Agora Francia - Notifications</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="Website icon" type="png" href="images/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <nav>
            <ul class="list">
                <li><a style="color:black;text-decoration:none" href="../index.php">Accueil</a></li>
                <li><a style="color:black;text-decoration:none" href="produits.php">Tout parcourir</a></li>
                <li><a style="color:black;text-decoration:none" href="notifications.php">Notifications</a></li>
                <li><a style="color:black;text-decoration:none" href="panier.php">Panier</a></li>
                <li><a style="color:black;text-decoration:none" href="formlulairemodif.php">Votre Compte</a></li>
            </ul>
        </nav>
        <header>
            <h1>Votre compte</h1>
        </header>

        <main>
            <div class="parent">
                <div class="containerProfil">
                    <div class="profil">
                        <img src="<?= $show['photo']; ?>" class="profil">
                    </div>
                    <div class="infoProfil">
                        <div class="NPetc">
                            Pseudo:
                            <?= $show['pseudo'] ?>
                            <br>
                            Nom:
                            <?= $show['nom'] ?>
                            <br>
                            Prenom:
                            <?= $show['prenom'] ?>
                            <br>
                            Email:
                            <?= $show['email'] ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="parent">
                <div class="containerProfil">
                    <div class="infoProfil">

                        adresse 1:
                        <?= $showadr['adresse_ligne1'] ?>
                        <br>
                        adresse 2:
                        <?= $showadr['adresse_ligne1'] ?>
                        <br>
                        Ville :
                        <?= $showadr['ville'] ?>
                        <br>
                        Code postale :
                        <?= $showadr['code_postal'] ?>
                        <br>
                        Pays :
                        <?= $showadr['pays'] ?>

                    </div>
                </div>
            </div>
        </main>
        <footer>
            <h><a href="AboutUs.php">About us </a>| Credit | ce que tu veux | blablabla</h>
        </footer>
    </div>
</body>

</html>