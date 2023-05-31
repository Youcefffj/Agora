
<?php

require_once "../Connection.php";

class RequeteConnexion extends Connection {

    public function __construct() {
    }

    /**
     * Retourne un utilisateur
     */

    public function getUser($pseudo) {
        $prepare = self::$db->prepare("SELECT * FROM user WHERE pseudo = ?");
        $prepare->execute([$pseudo]);

        $prepare = $prepare->fetch();//obligatoire quand tu fais select
        //var_dump ($prepare);
        return $prepare;
    }

}