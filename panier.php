<?php
// TODO 1: Inclure le header
include_once "includes/header.php";
// TODO 2: Initialiser une variable $total à 0
$total = 0;
?>

<div class="container my-4">
    <h1 class="mb-4">Mon Panier</h1>

    <!-- TODO 3: Vérifier si le panier est vide avec empty() -->
    <!-- Si vide : afficher une alerte Bootstrap info avec un lien vers index.php -->
    <?php
    if (empty($_SESSION["panier"])) {
        ?>
        <div class="alert alert-success" role="alert">
            Le panier est vide ! <a href="index.php" class="alert-link">Cliquez ici </a>. pour afficher la liste des
            produits
        </div>

        <?php exit;
    } ?>

    <!-- Si non vide : afficher le tableau du panier -->

    <!-- Structure du tableau Bootstrap responsive :  -->
    <div class="table table-striped">
        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Sous-total</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <!--TODO 4: Boucler sur $_SESSION['panier']-->
                <!-- - Afficher une ligne avec :
                * Image miniature (50x50px) + nom du produit
                * Prix unitaire
                * Quantité
                * Sous-total formaté avec number_format($sous_total, 2)-->
                <?php foreach ($_SESSION["panier"] as $produit) { ?>
                    <tr>
                        <td> <img style="width: 50px;height: 50px;" src="<?= $produit['thumbnail'] ?>" alt="" />
                            <?= $produit['title'] ?> </td>
                        <td> <?= $produit['price'] ?></td>
                        <td> <?= $produit['quantite'] ?></td>
                        <!--  - Calculer le sous-total (prix × quantité)-->
                        <td> <?= $produit['quantite'] * $produit['price'] ?></td>
                        <!--  - Ajouter le sous-total au total général -->
                        <?php $total += $produit['quantite'] * $produit['price'] ?>
                    </tr>

                <?php } ?>




            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">Total :</th>
                    <th><?php echo number_format($total, 2) ?> </th>
                </tr>
            </tfoot>
        </table>
    </div>


    <!-- TODO 5: Ajouter les boutons d'action -->
    <!-- Structure suggérée :  <i class="bi bi-trash"></i> -->
    <div class="d-flex justify-content-between mt-4">
        <!-- Bouton "Continuer les achats" (lien vers index.php)-->
        <a href="index.php" class="btn btn-primary btn-sm">
            Continuer les achats
        </a>

        <!-- Formulaire pour vider le panier (POST vers actions/vider_panier.php)
        avec un bouton "Vider le panier" (classe btn-danger) -->
        <a href="actions/vider_panier.php" class="btn btn-danger btn-sm">
            Vider le panier
        </a>
    </div>

</div>

<!-- TODO 6: Inclure Bootstrap JS -->
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