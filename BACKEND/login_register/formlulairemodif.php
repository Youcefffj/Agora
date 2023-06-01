<?php

session_start();

include "../Controller.php";


function formRegister() {
    ?>
    <div class="parent">
        <h1 class="main-title">Inscription</h1>
        <form method="post" class="form-connection">

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

            <div class="form-line">
                <label class="big-2" for="pseudo">Pseudo</label>
                <input class="input" type="text" name="pseudo" placeholder="Pseudo" required>
            </div>

            <div class="form-line">
                <label class="big-2" for="email">Adresse Mail</label>
                <input class="input" type="email" name="email" placeholder="test@gmail.com" required>
            </div>

            <div class="form-line">
                <label class="big-2" for="password">Mot de Passe</label>
                <input class="input" type="password" name="password" placeholder="Mot de Passe" required>
            </div>

            <div class="form-line">
                <label class="big-2" for="password-confirm">Confirmation</label>
                <input class="input" type="password" name="password-confirm" placeholder="Mot de Passe" required>
            </div>

            <div class="form-line">
                <label class="big-2" for="firstname">Nom</label>
                <input class="input" type="text" name="firstname" placeholder="Nom" required>
            </div>

            <div class="form-line">
                <label class="big-2" for="surname">Prenom</label>
                <input class="input" type="text" name="surname" placeholder="Prenom" required>
            </div>

            <div class="form-line">
                <label class="big-2" for="adresse">adresse</label>
                <input class="input" type="text" name="adresse" placeholder="adresse" required>
            </div>

            <div class="form-line">
                <label class="big-2" for="adresse">adresse2</label>
                <input class="input" type="text" name="adresse2" placeholder="adresse" >
            </div>

            <div class="form-line">
                <label class="big-2" for="ville">VILLE</label>
                <input class="input" type="text" name="ville" placeholder="ville" required>
            </div>

            
            <div class="form-line">
                <label class="big-2" for="CP">CP</label>
                <input class="input" type="number" name="CP" placeholder="CP" required>
            </div>

            <div class="form-line">
                <label class="big-2" for="pays">pays</label>
                <input class="input" type="text" name="pays" placeholder="pays" required>
            </div>

            <div class="form-line">
                <label class="big-2" for="photo">Photo de profil</label>
                <input class="input" type="file" name="photo" accept="image/*" required>
            </div>

            <div class="form-line">
                <input class="input" type="checkbox" name="checkbox" required>j'ai lu et j'accepte les conditions generales d'utilisation
            </div>

            <input type="submit" name="register-form" value="S'inscrire" >


        </form>
    
        <p class="big-1">
            Déjà inscrits ? Clique <a class="blue-button-small" href="index.php?module=connection&action=connect">ici</a>.
        </p>
    </div>

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



?>


<?php
function formConnection() {
    ?>
    <div class="main-box">
        <h1 class="main-title">Connexion</h1>
        <form method="post" class="form-connection">
            <div class="form-line">
                <label class="big-2" for="pseudo">Pseudo</label>
                <input class="input" type="text" name="pseudo" placeholder="Pseudo" required>
            </div>

            <div class="form-line">
                <label class="big-2" for="password">Mot de Passe</label>
                <input class="input" type="password" name="password" placeholder="Mot de Passe" required>
            </div>

            <input class="blue-button" type="submit" name="connection-form" value="Se Connecter">
        </form>
        <p class="big-1">
            Pas encore inscrits ? Clique <a class="blue-button-small" href="index.php?module=connection&action=register">ici</a>.
        </p>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifier si le formulaire a été soumis
        
        // Récupérer les valeurs soumises
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];
        

        // Préparer et exécuter la requête de vérification de l'utilisateur
        $prepare = Connection::$db->prepare("SELECT * FROM user WHERE pseudo = ? AND mdp = ?");
        $prepare->execute(array($pseudo, $password));
        
        $prepare = $prepare->fetch();//obligatoire quand tu fais select
        var_dump ($prepare);
        
        if($prepare){
            $_SESSION['user'] = $prepare["id_user"]; //garder la session sur le user.
        }
        else{
            echo'Identifiants invalides';
        }
        
        




    }
    
}

?>





<!DOCTYPE html>
<html>
    <body>
        <?php
            formRegister();
            //formConnection();
        ?>
    </body>
</html>
