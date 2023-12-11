<?php
require '../admin/includes/inc-top.php';
?>

<main>
    <h1 class="h1">Gestionnaire - Base de Données</h1>
    <div class="button-container">
        <a href="/admin/cruds/utilisateurs/index.php">
            <button type="button">Utilisateurs</button>
        </a>
        <a href="/admin/cruds/produits/index.php">
            <button type="button">Produits</button>
        </a>
        <a href="/admin/cruds/catégories/index.php">
            <button type="button">Catégorie</button>
        </a>
        <a href="/admin/cruds/marques/index.php">
            <button type="button">Marques</button>
        </a>
    </div>
    <div class="button-container">
        <a href="/admin/cruds/roles/index.php">
            <button type="button">Rôles</button>
        </a>
        <a href="/admin/cruds/reduction/index.php">
            <button type="button">Réductions</button>
        </a>
        <a href="/admin/cruds/images/index.php">
            <button type="button">Images</button>
        </a>
        <a href="/admin/cruds/avis/index.php">
            <button type="button">Avis</button>
        </a>
    </div>
</main>

<?php require '../admin/includes/inc-bottom.php'; ?>