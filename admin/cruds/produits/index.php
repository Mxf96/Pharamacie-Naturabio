<?php
require '../../managers/produit-manager.php';
require '../../../includes/inc-db-connect.php';

$produits = getAllProducts($dbh);

require '../../includes/inc-top-crud.php';
?>

<div>
    <h1 class="h1">Liste des Produits</h1>
    <a href="/admin/menu.php" class="back-button">Retour</a>
    <a href="/admin/cruds/produits/new.php" class="create-button">Créer un nouveau produit</a>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Catégorie</th>
            <th>Marque</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produits as $produit): ?>
            <tr>
                <td><?= htmlspecialchars($produit['id_produit']); ?></td>
                <td><?= htmlspecialchars($produit['nom_produit']); ?></td>
                <td><?= htmlspecialchars($produit['nom_categorie']); ?></td>
                <td><?= htmlspecialchars($produit['nom_marque']); ?></td>
                <td><?= htmlspecialchars($produit['description_produit']); ?></td>
                <td><?= htmlspecialchars($produit['prix_produit']); ?></td>
                <td><?= htmlspecialchars($produit['quantite_produit']); ?></td>
                <td>
                    <a href="edit.php?id=<?= htmlspecialchars($produit['id_produit']); ?>">Modifier</a> |
                    <a href="delete.php?id=<?= htmlspecialchars($produit['id_produit']); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require '../../includes/inc-bottom.php'; ?>
