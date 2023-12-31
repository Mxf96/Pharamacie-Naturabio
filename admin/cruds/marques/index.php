<?php
require '../../managers/marque-manager.php';;
require '../../../includes/inc-db-connect.php';
$marques = getAllBrands($dbh);
require '../../includes/inc-top-crud.php';
?>
<div>
    <h1 class="h1">Liste des Marques</h1>
    <a href="/admin/menu.php" class="back-button">Retour</a>
    <a href="/admin/cruds/marques/new.php" class="create-button">Créer une nouvelle marque</a>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($marques as $marque) { ?>
            <tr>
                <td><?php echo $marque['id_marque']; ?></td>
                <td><?php echo $marque['nom_marque']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $marque['id_marque']; ?>">Modifier</a> |
                    <a href="delete.php?id=<?php echo $marque['id_marque']; ?>">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php require '../../includes/inc-bottom.php'; ?>