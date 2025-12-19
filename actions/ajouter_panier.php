<?php

// TODO 1: Démarrer la session
session_start();

// TODO 2: Vérifier que la requête est bien en POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // TODO 3: Récupérer les données du formulaire
    // Variables nécessaires : $id, $title, $price, $thumbnail
    $id = $_POST["id"] ?? null;
    $title = $_POST["title"] ?? "";
    $price = $_POST["price"] ?? 0;
    $photo = $_POST["photo"] ?? "";
    $quantite = $_POST['quantite'] ?? 1;

    // TODO 4: Vérifier si le produit existe déjà dans le panier
    // Indice : Parcourir $_SESSION['panier'] avec foreach
    // Si le produit existe (même id), incrémenter sa quantité
    // Utilisez une variable $produit_existe pour savoir si on l'a trouvé
    $produit_existe = false;
    foreach ($_SESSION["panier"] as &$produit) {
        if ($produit["id"] == $id) {
            $produit_existe = true;
            $produit["quantite"] += $quantite;
            break;
        }
    }

    if (!$produit_existe) {
        $unProduit = [
            'id' => $id,
            'title' => $title,
            'price' => $price,
            'thumbnail' => $photo,
            'quantite' => 1
        ];
        $_SESSION["panier"][] = $unProduit;

    }

    // TODO: Parcourir le panier et chercher le produit
    // IMPORTANT : Utilisez &$item dans le foreach pour modifier directement l'élément
    // foreach ($_SESSION['panier'] as &$item) { ... }

    // TODO 5: Si le produit n'existe pas, l'ajouter au panier
    // Structure d'un article dans le panier :
    // [
    //     'id' => $id,
    //     'title' => $title,
    //     'price' => $price,
    //     'thumbnail' => $thumbnail,
    //     'quantite' => 1
    // ]
}

// TODO 6: Rediriger vers la page précédente
// Indice : Utilisez header('Location: ' . $_SERVER['HTTP_REFERER']);
// N'oubliez pas exit(); après la redirection

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



</body>

</html>


<pre>
  <?php
  print_r($_SESSION["panier"]);

  ?> 
</pre>