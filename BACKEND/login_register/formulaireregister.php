<?php

function formRegister() {
    ?>
    <div class="main-box">
        <h1 class="main-title">Inscription</h1>
        <form method="post" class="form-connection">
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

            <input class="blue-button" type="submit" name="register-form" value="S'inscrire">
        </form>
    
        <p class="big-1">
            Déjà inscrits ? Clique <a class="blue-button-small" href="index.php?module=connection&action=connect">ici</a>.
        </p>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifier si le formulaire a été soumis

        // Récupérer les valeurs soumises
        $status = 'acheteur';
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConfirm =$_POST['password-confirm']; 
        $nom  =$_POST['firstname']; 
        $prenom  =$_POST['surname']; 
        $adresse = 4;
        $photo= NULL;
        $image_fond_pref= NULL;
        $clause_acceptee= 1;
        $id_moy_paiement=2;

        // Vérifier si les mots de passe correspondent
        if ($password === $passwordConfirm) {
            // Connexion à la base de données (exemple avec MySQLi)
            $host = 'localhost'; // adresse du serveur MySQL
            $dbuser = 'root'; // nom d'utilisateur MySQL
            $dbpassword = ''; // mot de passe MySQL
            $dbname = '1erJet'; // nom de la base de données
            
            // connexion à la base de données MySQL
            $conn = mysqli_connect($host, $dbuser, $dbpassword, $dbname);

            if ($conn->connect_error) {
                die('Erreur de connexion à la base de données : ' . $conn->connect_error);
            }

            // Préparer et exécuter la requête d'insertion
            $stmt = $conn->prepare('INSERT INTO user(`status` ,pseudo, email, mdp, nom, prenom, id_adr, photo, image_fond_pref, clause_acceptee, id_moy_paiement)VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->bind_param('sssssisssii', $status ,$pseudo, $email, $password, $nom, $prenom, $adresse, $photo, $image_fond_pref, $clause_acceptee, $id_moy_paiement);
            $stmt->execute();

            // Vérifier si l'insertion a réussi
            if ($stmt->affected_rows > 0) {
                echo 'Utilisateur ajouté avec succès à la base de données.';
            } else {
                echo 'Erreur lors de l\'ajout de l\'utilisateur à la base de données.';
            }

            // Fermer la connexion et libérer les ressources
            $stmt->close();
            $conn->close();
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
        
        // Connexion à la base de données (exemple avec MySQLi)
        $host = 'localhost'; // adresse du serveur MySQL
        $dbuser = 'root'; // nom d'utilisateur MySQL
        $dbpassword = ''; // mot de passe MySQL
        $dbname = '1erJet'; // nom de la base de données

        // Connexion à la base de données MySQL
        $conn = mysqli_connect($host, $dbuser, $dbpassword, $dbname);

        if ($conn->connect_error) {
            die('Erreur de connexion à la base de données : ' . $conn->connect_error);
        }

        // Préparer et exécuter la requête de vérification de l'utilisateur
        $stmt = $conn->prepare('SELECT * FROM user WHERE pseudo = ? AND mdp = ?');
        $stmt->bind_param('ss', $pseudo, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Vérifier si l'utilisateur existe
        if ($result->num_rows > 0) {
            // L'utilisateur existe, effectuez les actions appropriées (par exemple, connectez l'utilisateur)
            echo 'Connexion réussie.';
        } else {
            // L'utilisateur n'existe pas ou les informations d'identification sont incorrectes
            echo 'Nom d\'utilisateur ou mot de passe incorrect.';
        }

        // Fermer la connexion et libérer les ressources
        $stmt->close();
        $conn->close();
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