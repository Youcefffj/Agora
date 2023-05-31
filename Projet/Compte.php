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
                <h1>Inscrivez vous !</h1>
            </header>

            <main>
                <div class="parent">
                    <div class="form">


                        <label class="radio-button">
                            <input value="option1" name="example-radio" type="radio">
                            <span class="radio" required></span>
                            vendeur
                        </label>

                        <label class="radio-button">
                            <input value="option2" name="example-radio" type="radio">
                            <span class="radio" required></span>
                            Acheteur
                        </label>
                        <br><br>
                        <input type="text" name="text" class="input" placeholder="Username :" Required>
                        <br><br>
                        <input type="email" name="text" class="input" placeholder="Mail :"Required>
                        <br><br>
                        <input type="password" name="text" class="input" placeholder="Password : "Required>
                        <br><br>    
                        <input type="password" name="text" class="input" placeholder="Password confirmation :"Required>
                        <br><br>
                        <input type="text" name="text" class="input" placeholder="Name :"Required>
                        <br><br>
                        <input type="text" name="text" class="input" placeholder="Surname :"Required>
                        <br><br>
                        <input type="text" name="text" class="input" placeholder="Address 1:"Required>
                        <input type="text" name="text" class="input" placeholder="Address 2:">
                        <br><br>
                        <input type="text" name="text" class="input" placeholder="City :"Required>
                        <input type="number" name="text" class="input" placeholder="Zip Code :"Required>
                        <br><br>
                        <input type="text" name="text" class="input" placeholder="Country :"Required>
                        <br><br>

                        <button class="send">Envoyer</button>
                        <br><br>



                        <p>déjà inscris ? cliquer <a href="login.php" >ici</a></p>

                    </div>
                </div>


            </main>
        </div>
    </body>
</html>
