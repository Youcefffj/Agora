
<?php
include "../Connection.php";

session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Agora Francia - Site de e-commerce</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="Website icon" type="png" href="images/logo.png">
        <script src="script.js"></script>

    </head>
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
                <h1>Qui sommes-nous ?</h1>
            </header>

            <main>
                <div class="contain">
                    <div class="crea">
                        <div class="LesNoms">
                            Eric
                        </div>
                        <div class="contenu">
                            developpeur front-end
                            developpeur back-end
                        </div>
                    </div>
                    <div class="crea">
                        <div class="LesNoms">
                            Jules
                        </div>
                        <div class="contenu">
                            developpeur front-end
                            developpeur back-end
                        </div>
                    </div>
                    <div class="crea">
                        <div class="LesNoms">
                            Rayan
                        </div>
                        <div class="contenu">
                            developpeur front-end
                            developpeur back-end
                        </div>
                    </div>
                    <div class="crea">
                        <div class="LesNoms">
                            Youcef
                        </div>
                        <div class="contenu">
                            developpeur front-end
                            developpeur back-end

                        </div>

                    </div>
                </div>
                <div class="parent">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d914.8987668460321!2d2.288550421906088!3d48.85127328572405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b4f58251b%3A0x167f5a60fb94aa76!2sECE%20-%20Ecole%20d&#39;ing%C3%A9nieurs%20-%20Engineering%20school.!5e0!3m2!1sfr!2sfr!4v1685616665186!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>



            </main>
        </div>
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
