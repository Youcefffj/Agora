<!DOCTYPE html>

<html>

    <head>
        <title>Agora Francia - Site de e-commerce</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="Website icon" type="png" href="images/logo.png">

    </head>
    <?php

    session_start();

    include "../Controller.php";


    function formConnection() {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Vérifier si le formulaire a été soumis

            // Récupérer les valeurs soumises
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];


            // Préparer et exécuter la requête de vérification de l'utilisateur
            $prepare = Connection::$db->prepare("SELECT * FROM user WHERE pseudo = ? AND mdp = ?");
            $prepare->execute(array($pseudo, $password));

            $prepare = $prepare->fetch();//obligatoire quand tu fais select
            /*var_dump ($prepare);*/

            if($prepare){
                $_SESSION['user'] = $prepare["id_user"]; //garder la session sur le user.

                echo'Vous êtes connecté en tant que ';
                echo $prepare["pseudo"];
                
                if ($prepare["status"]=="admin"){
                    echo '<script>window.location.href = "InterfaceAdmin.php";</script>';
                }else{
                    echo '<script>window.location.href = "../index.php";</script>';
                }
                
            }else{
                echo'Identifiants invalides';
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
                    <li><a style="color:black;text-decoration:none" href="Panier.php">Panier</a></li>
                    <li><a style="color:black;text-decoration:none" href="formlulairemodif.php">Votre Compte</a></li>
                    <li><a style="color:black;text-decoration:none" href="ShowProfil.php">Personnel</a></li>
                </ul>
            </nav>
            <header>
                <h1>Content de vous revoir !</h1>
            </header>
            <main>
                <form method="post" class="parent">
                    <div class="form">
                        <input class="input" type="text" name="pseudo" placeholder="Pseudo" required>
                        <br><br>
                        <input class="input" type="password" name="password" placeholder="Mot de Passe" required>

                        <br><br>

                        <input class="send" type="submit" name="connection-form" value="Se Connecter">
                    </div>
                </form>
                <p class="big-1">
                    Pas encore inscrits ? <a class="blue-button-small" href="Compte.php">Clique ici</a>.
                </p>
                <div class="parent">
                    <?php
                    formConnection();
                    ?>
                </div>
            </main>
            <footer>
                <h><a href="AboutUs.php">About us </a>| Credit | ce que tu veux | blablabla</h>
            </footer>
        </div>
    </body>
</html>



