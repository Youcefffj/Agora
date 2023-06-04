<?php

//////////////////////////////////////////////
///**********NE PAS MODIFIER***************///
//////////////////////////////////////////////

session_start();

include "../Controller.php";
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Agora Francia - Site de e-commerce</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="Website icon" type="png" href="images/logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Dernier CSS compilé et minifié -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!-- Bibliothèque jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <!-- Dernier JavaScript compilé -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="script.js"></script>

    </head>

    <?php


    function formRegister() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifier si le formulaire a été soumis

            // Récupérer les valeurs soumises

            $status = $_POST['status'];
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordConfirm =$_POST['password-confirm']; 
            $nom  =$_POST['firstname']; 
            $prenom  =$_POST['surname']; 
            $photo  =$_FILES['photo']['tmp_name'];
            $image_fond_pref= NULL;
            $clause_acceptee= 1;

            //informations de livraison
            $adresse  =$_POST['adresse'];
            $adresse2  =$_POST['adresse2'];
            $ville  =$_POST['ville'];
            $CP  =$_POST['CP'];
            $pays  =$_POST['pays'];
            $id_carte = NULL;

            $destinationPP='PP/images'.rand(0,10000000).'.jpg';
            move_uploaded_file($photo,$destinationPP);

            // Vérifier si les mots de passe correspondent
            if ($password === $passwordConfirm) {

                $prepare = Connection::$db->prepare("INSERT INTO adresse(adresse_ligne1 ,adresse_ligne2, ville, code_postal, pays) VALUES (?, ?, ?, ?, ?)");
                $prepare->execute(array($adresse ,$adresse2, $ville, $CP, $pays));

                $adresse_id = Connection::$db->lastInsertId();





                // Préparer et exécuter la requête d'insertion
                $prepare = Connection::$db->prepare("INSERT INTO user(`status` ,pseudo, email, mdp, nom, prenom, id_adr, photo, image_fond_pref, clause_acceptee, id_moy_paiement)VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $prepare->execute(array($status ,$pseudo, $email, $password, $nom, $prenom, $adresse_id, $destinationPP, $image_fond_pref, $clause_acceptee, $id_carte));

                //cession utilisateur
                $lastInsertId = Connection::$db->lastInsertId();

                // Définir la variable de session pour l'utilisateur
                $_SESSION['user'] = $lastInsertId;

                //echo '<script>window.location.href = "infopaiement.php";</script>';

            } else {
                echo 'Les mots de passe ne correspondent pas.';
            }


        }

    }

    ?>


    <body>
        <div class="wrapper">
            <nav>
                <ul class="list">
                    <li><a style="color:black;text-decoration:none" href="../index.php">Accueil</a></li>
                    <li><a style="color:black;text-decoration:none" href="produits.php">Tout parcourir</a></li>
                    <li><a style="color:black;text-decoration:none" href="notifications.php">Notifications</a></li>
                    <li><a style="color:black;text-decoration:none" class="perso" href="Panier.php">Panier</a></li>
                    <li><a style="color:black;text-decoration:none" class="PasCompte" href="formlulairemodif.php">Votre Compte</a></li>
                    <li><a style="color:black;text-decoration:none" class="perso" href="ShowProfil.php">Personnel</a></li>
                </ul>
            </nav>

            <header>
                <h1>Inscrivez vous !</h1>
            </header>

            <main>
                <div class="parent">
                    <form class="form" method="post" enctype="multipart/form-data">


                        <label class="radio-button">
                            <input value="acheteur" name="status" type="radio" required>
                            <span class="radio" ></span>
                            ACHETEUR
                        </label>

                        <label class="radio-button">
                            <input value="vendeur" name="status" type="radio">
                            <span class="radio" ></span>
                            VENDEUR
                        </label>
                        <br><br>
                        <input type="text" name="pseudo" class="input" placeholder="Username :" Required>
                        <br><br>
                        <input type="email" name="email" class="input" placeholder="Mail :"Required>
                        <br><br>
                        <input type="password" name="password" class="input" placeholder="Password : "Required>
                        <br><br>    
                        <input type="password" name="password-confirm" class="input" placeholder="Password confirmation :"Required>
                        <br><br>
                        <input type="text" name="firstname" class="input" placeholder="Name :"Required>
                        <br><br>
                        <input type="text" name="surname" class="input" placeholder="Surname :"Required>
                        <br><br>
                        <input type="text" name="adresse" class="input" placeholder="Address 1:"Required>
                        <input type="text" name="adresse2" class="input" placeholder="Address 2:">
                        <br><br>
                        <input type="text" name="ville" class="input" placeholder="City :"Required>
                        <input type="number" name="CP" class="input" placeholder="Zip Code :"Required>
                        <br><br>
                        <input type="text" name="pays" class="input" placeholder="Country :"Required>
                        <br><br>
                        <p>Photo de profil</p>
                        <input class="inputphoto" type="file" name="photo" accept="image/*" required>
                        <br><br>

                        <p>J'ai lu et j'accepte les  <a target="_blank" href="condiitions_g%C3%A9n%C3%A9rales_utilisation.html">conditions générales d'utilisation</a> </p>

                        <input class="cyberpunk-checkbox" type="checkbox" name="checkbox" required>
                        <br>


                        <input type ="submit" class="send" placeholder ="Envoyer" name="register-form">
                        <br><br>

                        <p>déjà inscris ? <a href="formlulairemodif.php" >cliquer ici</a></p>
                    </form>

                </div>

            </main>
            <footer>
                <h><a href="AboutUs.php">About us </a>| Credit | ce que tu veux | blablabla</h>
            </footer>
        </div>
        <?php
        formRegister();
        ?>
    </body>
</html>
<script>
    window.onload = function() {
        var liens = document.getElementsByClassName("perso");

        // Vérifiez ici votre condition pour rendre les liens non cliquables
        var isUserLoggedIn = <?php echo isset($_SESSION["user"]) ? 'true' : 'false'; ?>;
        if (!isUserLoggedIn) {
            for (var i = 0; i < liens.length; i++) {
                var lien = liens[i];
                lien.removeAttribute("href");
                lien.style.pointerEvents = "none";
                lien.style.color = "gray";
            }
        }
        var liens = document.getElementsByClassName("PasCompte");

        // Vérifiez ici votre condition pour rendre les liens non cliquables
        var isUserLoggedIn = <?php echo isset($_SESSION["user"]) ? 'true' : 'false'; ?>;
        if (isUserLoggedIn) {
            for (var i = 0; i < liens.length; i++) {
                var lien = liens[i];
                lien.removeAttribute("href");
                lien.style.pointerEvents = "none";
                lien.style.color = "gray";
            }
        }
    }
</script>


