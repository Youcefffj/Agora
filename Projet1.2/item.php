IL FAUT AUTOMATISER LA PAGE POUR CHAQUE ITEM VIA LA BASE DE DONNER ID

<!DOCTYPE html>
<html>
    <head>
        <title>Agora Francia - Site de e-commerce</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="Website icon" type="png" href="images/logo.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="wrapper">
            <nav>
                <ul class="list">
                    <li><a style="color:black;text-decoration:none" href="index.php">Accueil</a></li>
                    <li><a style="color:black;text-decoration:none" href="#">Tout parcourir</a></li>
                    <li><a style="color:black;text-decoration:none" href="#">Notifications</a></li>
                    <li><a style="color:black;text-decoration:none" href="#">Panier</a></li>
                    <li ><a style="color:black;text-decoration:none" href="login.php">Votre Compte</a></li>
                </ul>

            </nav>
            <header>



                <div class="container-fluid d-flex flex-lg-row flex-column justify-content-center align-items-center">
                    <div class="col-lg-4 col-10 trucs">
                        <img src="#" class="imageProd">image
                    </div>
                    <div class="col-lg-4 col-10 trucs">
                        <div class="info">
                            <p class="NDP">"Nom du produit"</p>
                            <p class="infoProd">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 trucs">
                        <div class="Tools">
                            <p>Prix : 000€</p>
                            <label style="font-size: 25px">Quantité :</label> 
                            <input type="number" value="quantite"  style="width:100px;text-align:center;height:50px" min="0">
                            <br>
                            <button class="send"> Add to Card </button>
                            <button class="send"> Négocier </button>
                            <button class="send"> Enchère </button>
                            <br>
                            
                        </div>
                    </div>  
                </div>
            </header>

            <main>

            </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>