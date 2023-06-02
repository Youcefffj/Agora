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

    </head>
    <?php

    session_start();

    include "Controller.php";


    function formRegister() {
    ?>
    <body>
        <div class="wrapper">
            <nav>
                <ul class="list">
                    <li><a style="color:black;text-decoration:none" href="index.php">Accueil</a></li>
                    <li><a style="color:black;text-decoration:none" href="produits.php">Tout parcourir</a></li>
                    <li><a style="color:black;text-decoration:none" href="notifications.php">Notifications</a></li>
                    <li><a style="color:black;text-decoration:none" href="#">Panier</a></li>
                    <li ><a style="color:black;text-decoration:none" href="formlulairemodif.php">Votre Compte</a></li>
                </ul>

            </nav>

            <header>
                <h1 class="main-title">Inscrivez-vous</h1>
            </header>
            <main>

                <div class="parent">

                    <form method="post" class="form">

                        <label class="radio-button">
                            <input value="acheteur" name="status" type="radio" required>
                            <span class="radio" ></span>
                            ACHETEUR
                        </label>

                        <label class="radio-button">
                            <input value="vendeur" name="status" type="radio" >
                            <span class="radio" ></span>
                            VENDEUR
                        </label>
                        <br><br>

                        <input class="input" type="text" name="pseudo" placeholder="Pseudo" required>
                        <br><br>


                        <input class="input" type="email" name="email" placeholder="Email@mail" required>
                        <br><br>

                        <input class="input" type="password" name="password" placeholder="Mot de Passe" required>
                        <br><br>

                        <input class="input" type="password" name="password-confirm" placeholder="Confirmation" required>
                        <br><br>


                        <input class="input" type="text" name="firstname" placeholder="Nom" required>
                        <br><br>

                        <input class="input" type="text" name="surname" placeholder="Prenom" required>
                        <br><br>

                        <input class="input" type="text" name="adresse" placeholder="adresse 1" required>

                        <input class="input" type="text" name="adresse2" placeholder="adresse 2" >
                        <br><br>

                        <input class="input" type="text" name="ville" placeholder="ville" required>

                        <input class="input" type="number" name="CP" placeholder="CP" required>
                        <br><br>


                        <input class="input" type="text" name="pays" placeholder="pays" required>


                        <br><br>

                        <input class="photo" type="file" name="photo" accept="image/*" required>
                        <br><br>


                        <input class="input" type="checkbox" name="checkbox" required> j'ai lu et j'accepte les conditions generales d'utilisation

                        <br><br>
                        <input type="submit" class="send" name="register-form" value="S'inscrire" >


                        <p>Déjà inscrits ? Clique <a href="index.php?module=connection&action=connect">ici</a>.
                        </p>


                    </form>

                </div>
            </main>
            <footer>
                <h><a href="AboutUs.php">About us </a>| Credit | ce que tu veux | blablabla</h>
            </footer>
        </div>
    </body>
</html>



<?php
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
            $photo  =$_POST['photo'];
            $image_fond_pref= NULL;
            $clause_acceptee= 1;

            //informations de livraison
            $adresse  =$_POST['adresse'];
            $adresse2  =$_POST['adresse2'];
            $ville  =$_POST['ville'];
            $CP  =$_POST['CP'];
            $pays  =$_POST['pays'];
            $id_carte = NULL;

            // Vérifier si les mots de passe correspondent
            if ($password === $passwordConfirm) {

                $prepare = Connection::$db->prepare("INSERT INTO adresse(adresse_ligne1 ,adresse_ligne2, ville, code_postal, pays) VALUES (?, ?, ?, ?, ?)");
                $prepare->execute(array($adresse ,$adresse2, $ville, $CP, $pays));

                $adresse_id = Connection::$db->lastInsertId();





                // Préparer et exécuter la requête d'insertion
                $prepare = Connection::$db->prepare("INSERT INTO user(`status` ,pseudo, email, mdp, nom, prenom, id_adr, photo, image_fond_pref, clause_acceptee, id_moy_paiement)VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $prepare->execute(array($status ,$pseudo, $email, $password, $nom, $prenom, $adresse_id, $photo, $image_fond_pref, $clause_acceptee, $id_carte));

                //cession utilisateur
                $lastInsertId = Connection::$db->lastInsertId();

                // Définir la variable de session pour l'utilisateur
                $_SESSION['user'] = $lastInsertId;

                header("Location: infopaiement.php");
                exit(); // Assurez-vous de terminer le script ici

            } else {
                echo 'Les mots de passe ne correspondent pas.';
            }


        }

    }

formRegister();

?>


