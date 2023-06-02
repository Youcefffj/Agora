<!DOCTYPE html>
<html>
    <head>
        <title>Agora Francia - Catégories de produits</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="Website icon" type="png" href="images/logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class=wrapper2>
            <header>

                <p class="titre_admin">Interface Administrateur</p>

            </header>
            <main>
                <div class="parent">
                    <div class="infoAdmin">
                        <p>Admin :</p>
                        <p>Numero :</p>

                    </div>
                </div>
                <div class="parent">
                    <div class="chooseUrChamp">
                        <label for="User">selectionner un utilisateur à supprimer </label>

                        <select name="User" id="User">
                            <option value="User">User1</option>
                            <option value="User">User2</option>
                            <option value="User">User3</option>
                        </select>
                        <br><br>
                        <label for="Item">selectionner un item à supprimer </label>
                        <select name="ItemSupp" id="User">
                            <option value="Item">Item1</option>
                            <option value="Item">Item2</option>
                            <option value="Item">Item3</option>
                        </select>
                        <br>
                        <br>
                        <label for="Item">selectionner un acheteur à promouvoir </label>
                        <select name="Buyer" id="User">
                            <option value="buyer">Buyer1</option>
                            <option value="buyer">Buyer2</option>
                            <option value="buyer">Buyer3</option>
                        </select>
                        <br><br>

                        <input type="button" id="capart" value="confirmer">

                    </div>
                </div>

                <br><br>
                <p></p>

            </main>
        </div>
    </body>
</html>