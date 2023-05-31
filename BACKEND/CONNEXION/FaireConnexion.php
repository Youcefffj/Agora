
<?php

include "../Controller.php";
require "RequeteConnexion.php";
require "VueConnexion.php";

class FaireConnexion {

    private $requete;
    private $vue;

    public function __construct() {
        $this->requete = new RequeteConnexion();
        $this->vue = new VueConnection();
    }

    function connect() {
        // Connection form not send
        if (!isset($_POST['form-connection'])) {
            $this->vue->formConnection();
            return;
        }

        // Already connected
        if ($this->isConnected()) {
            echo'wesh';
            $this->vue->connectionSuccess();
            return;
        }

        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];
        $user = $this->requete->getUser($pseudo);

        // User not exist
        if (!isset($user) || empty($user)) {
            $this->vue->notExist();
            $this->vue->formConnection();
            return;
        }

        // Wrong password
        if (!password_verify($password, $user['mdp'])) {
            echo $password;
            echo $user['mdp'];
            $this->vue->wrongPassword();
            $this->vue->formConnection();
            return;
        }

        $_SESSION['pseudo'] = $pseudo;
        echo"ouioui";
        //header( "refresh:0;url=index.php?module=compte");
    }


    private function isConnected() {
        return isset($_SESSION['pseudo']);
    }

}

?>



<!DOCTYPE html>
<html>
    <body>
        <?php
            
            // Crée une instance de la classe FaireConnexion
            $faireConnexion = new FaireConnexion();
            
            // Appelle la méthode connect() à partir de l'instance de la classe
            $faireConnexion->connect();
        ?>
    </body>
</html>