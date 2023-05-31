
<?php

class VueConnection {

    public function formConnection() {
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
    }

    public function connectionSuccess() {
        ?>

        <div class="success-message">
            <p class="big-1">Vous êtes connecté en tant que <?=$_SESSION['pseudo'];?></p>
        </div>

        <?php
    }

    public function notExist() {
        ?>

        <div class="error-message">
            <p class="big-1">Vous devez d'abord vous inscrire.</p>
        </div>

        <?php
    }

    public function wrongPassword() {
        ?>

        <div class="error-message">
            <p class="big-1">Mauvais mot de passe</p>
        </div>

        <?php
    }


}