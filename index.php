<?php

session_start();
// TODO 1: Inclure le fichier header.php
include_once "../includes/header.php";


// TODO 2: Récupérer les produits depuis l'API
// URL de l'API : https://dummyjson.com/products?limit=30
// Indices : 
// - Utilisez file_get_contents() pour récupérer le JSON
$url = isset($url) ? $url : "https://dummyjson.com/products?limit=30";
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
        <h1 class="mb-4">Nos Produits</h1>

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
                            <button class="btn btn-primary w-100 mt-3">Ajouter au panier</button>
                        </div>
                    </div>


                </div>
            <?php } ?>



            <!-- TODO 4: Dans chaque carte, ajouter un formulaire pour l'ajout au panier -->
            <!-- Le formulaire doit :
             - Utiliser method="POST" et action="actions/ajouter_panier.php"
             - Contenir des champs hidden pour : id, title, price, thumbnail
             - Avoir un bouton submit avec :
               * Classe : btn btn-primary
               * Icône : bi-cart-plus
               * Texte : "Ajouter"
             
             Structure suggérée pour le bas de la carte :
             <div class="d-flex justify-content-between align-items-center mt-auto">
                 <span class="h5 mb-0">[PRIX] €</span>
                 <form>...</form>
             </div>
        -->
        </div>
    </div>

</body>

</html>