<?php
// TODO 1: Démarrer la session PHP
session_start();

// TODO 2: Initialiser le panier dans $_SESSION s'il n'existe pas
$_SESSION["panier"] = isset($_SESSION["panier"]) ? $_SESSION["panier"] : [];

// TODO 3: Calculer le nombre total d'articles dans le panier
// Indice : Le panier est un tableau d'articles, chaque article a une 'quantite'
// Utilisez array_column() pour extraire toutes les quantités, puis array_sum()
//$quantite = array_column($_SESSION['panier'], "quantite");
//$nombre_articles = array_sum($quantite);

?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Boutique en Ligne</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- TODO 4: Créer la structure de navigation Bootstrap -->

            <!-- Inclure : 
            - Un badge rouge affichant $nombre_articles
            -->
            <!--  - Un lien "Ma Boutique" vers index.php (classe navbar-brand)-->
            <!-- Logo/Nom du site -->
            <a class="navbar-brand cart-fill" href="../tp-sessions/index.php"><i class="bi bi-shop-window"></i></a>
            <!-- Reste de la navbar -->
            <!--   - Un bouton toggler pour mobile-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--  - Un menu avec deux liens :-->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <!--   * "Produits" vers index.php-->
                        <a class="nav-link active" href="../tp-sessions/index.php">Produits</a>
                    </li>
                    <!--  - Une icône panier (classe bi-cart)-->
                    <li class="nav-item ">
                        <!--  * "Panier" vers panier.php avec :-->
                        <a class="nav-link bi-cart" href="../tp-sessions/panier.php">Panier</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</body>

</html>