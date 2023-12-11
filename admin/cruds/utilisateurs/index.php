<?php
require '../../managers/utilisateur-manager.php';
require '../../../includes/inc-db-connect.php';
$users = getAllUsers($dbh);
require '../../includes/inc-top-crud.php';
?>
<div>
    <h1 class="h1">Liste des Utilisateurs</h1>
    <a href="/admin/menu.php" class="back-button">Retour</a>
    <a href="/admin/cruds/utilisateurs/new.php" class="create-button">Créer un nouvelle utilisateur</a>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>E-mail</th>
            <th>Rôle</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?php echo htmlspecialchars($user['id_utilisateur']); ?></td>
                <td><?php echo htmlspecialchars($user['prenom_utilisateur']); ?></td>
                <td><?php echo htmlspecialchars($user['nom_utilisateur']); ?></td>
                <td><?php echo htmlspecialchars($user['email_utilisateur']); ?></td>
                <td><?php echo htmlspecialchars($user['libelle_role']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo htmlspecialchars($user['id_utilisateur']); ?>">Modifier</a> |
                    <a href="delete.php?id=<?= htmlspecialchars($user['id_utilisateur']) ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur?');">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php require '../../includes/inc-bottom.php'; ?>