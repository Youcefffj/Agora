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
                    <li><a style="color:black;text-decoration:none" href="../index.php">Accueil</a></li>
                    <li><a style="color:black;text-decoration:none" href="produits.php">Tout parcourir</a></li>
                    <li><a style="color:black;text-decoration:none" href="notifications.php">Notifications</a></li>
                    <li><a style="color:black;text-decoration:none" href="panier.php">Panier</a></li>
                    <li ><a style="color:black;text-decoration:none" href="formlulairemodif.php">Votre Compte</a></li>
                </ul>

            </nav>
            <section>
                <h1 class="titre"> Mon panier</h1>
                <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-center">
                    <div class="col-lg-8 col-12 fond_panier taille_panier my-5 order-lg-1 order-2">
                        <div class="col-sm-12 fond_articles my-3">
                            <div class="container-fluid d-flex flex-column flex-md-row align-items-center">
                                <div class="col-xl-4 col-lg-3 col-8 col-sm-6 col-md-4 marge_articles_panier " >
                                    <img class="image" src="https://www.referenseo.com/wp-content/uploads/2019/03/image-attractive-960x540.jpg">
                                </div>
                                <div class="col-xl-6 col_sm-8 marge_articles_panier" >
                                    <div class="nom_objet" style="font-size: 30px;">
                                        baba
                                    </div>
                                    <div class="d-flex align-items-center" style="margin-top:15px">
                                        <span class="mr-2" style="font-size: 20px;">Quantité:</span>
                                        <div class="send_quantite_panier">
                                            12
                                        </div>
                                        <button class="send supprimer_panier" >Supprimer</button>
                                    </div>
                                    
                                </div>
                                <div class="col-sm-2 marge_articles_panier">
                                    Prix: .......
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-8 col-10 panier_acheter fond_panier mt-5 mb-5 mb-lg-0 order-lg-2 order-1">
                        <div class="py-5">
                            <p>Prix total: ...</p>
                            <a href=".//paiement.php"><button class="send mt-4">Payer</button></a>
                        </div>

                    </div>
                </div>
            </section>
            <footer>
                <h><a href="AboutUs.php">À propos de nous</a> | Crédits | Ce que tu veux | Blablabla</h>
            </footer>
        </div>   
    </body>
</html>
            