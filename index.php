<?php
session_start();
// TODO 1: Inclure le fichier header.php
require_once "includes/header.php";
// TODO 2: Récupérer les produits depuis l'API
// URL de l'API : https://dummyjson.com/products?limit=30
// Indices : 
// - Utilisez file_get_contents() pour récupérer le JSON
$url = isset($url) ? $url : "https://dummyjson.com/products?limit=100";
$json = file_get_contents($url);
// - Utilisez json_decode() avec true comme 2e paramètre pour obtenir un tableau
$data = json_decode($json, true);
// - Les produits sont dans $data['products']
$produits = $data["products"];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <title>Produits</title>
</head>

<body>
    <div class="container my-4">
        <h4 class="mb-4">Liste des Produits</h4>

        <div class="row">
            <!-- TODO 3: Boucler sur les produits avec foreach -->
            <?php foreach ($produits as $produit) { ?>
                <!-- - Une colonne responsive (col-md-6 col-lg-4 mb-4)
             - Une carte avec classe "card h-100" pour hauteur égale -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">

                        <!-- - L'image du produit (utiliser $produit['thumbnail'])
                        * Classe : card-img-top
                        * Style : height: 200px; object-fit: cover;-->

                        <img src="<?= $produit['thumbnail'] ?>" class="card-img-top"
                            style="height: 200px; object-fit: cover;" />
                        <!--   - Le corps de la carte avec :
                   * Le titre (dans un h5 avec classe card-title)
                   * La description (dans un p avec classe card-text)
                   * En bas : prix et bouton d'ajout 
            -->
                        <div class="card-body">
                            <h5 class="card-title"> <?= $produit['title'] ?></h5>
                            <p class="card-text">
                                <?= $produit["description"] ?>
                            </p>

                        </div>

                        <div class="card-footer bg-transparent">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="text-primary mb-0">$<?= $produit['price'] ?></h4>
                            </div>




                        </div>
                        <!-- TODO 4: Dans chaque carte, ajouter un formulaire pour l'ajout au panier -->
                        <!-- Le formulaire doit :
                                - Utiliser method="POST" et action="actions/ajouter_panier.php"
                                - Contenir des champs hidden pour : id, title, price, thumbnail
                                - Avoir un bouton submit avec :
                                * Classe : btn btn-primary
                                * Icône : bi-cart-plus
                                * Texte : "Ajouter"     
                            Structure suggérée pour le bas de la carte :  -->
                        <form action="actions/ajouter_panier.php" method="post" class="mt-3">
                            <input type="hidden" name="id" value="<?php echo $produit['id'] ?>">
                            <input type="hidden" name="title" value="<?php echo $produit['title'] ?>">
                            <input type="hidden" name="price" value="<?php echo $produit['price'] ?>">
                            <input type="hidden" name="photo" value="<?php echo $produit['thumbnail'] ?>">
                            <button class="btn btn-primary w-100 mt-3 bi-cart-plus">Ajouter</button>
                        </form>


                    </div>


                </div>
            <?php } ?>




        </div>
    </div>

    <!-- TODO 5: Inclure Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</body>

</html>