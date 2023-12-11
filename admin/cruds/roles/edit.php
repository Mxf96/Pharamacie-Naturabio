<?php
require '../../../includes/inc-db-connect.php';
require '../../managers/role-manager.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_role = $_POST['id_role'];
    $libelle_role = strip_tags(trim(htmlspecialchars($_POST['libelle_role'])));

    updateRole($dbh, $id_role, $libelle_role);

    header("Location: index.php");
    exit();
}

$id_role = isset($_GET['id']) ? $_GET['id'] : null; // Récupérer l'ID du rôle à éditer

if ($id_role !== null) {
    // Obtenir les détails du rôle
    $role = getRoleById($dbh, $id_role);

    if ($role !== false) {
        require '../../includes/inc-top-form.php';
?>

<div class="container">
    <div class="login-box">
        <a href="/admin/cruds/roles/index.php" class="btn btn-info btn-block">Retour</a>
        <h1>Modifier le rôle</h1>
        <form action="" method="post">
            <input type="hidden" name="id_role" value="<?php echo $role['id_role']; ?>">
            <div class="input-group">
                <label>Libellé du rôle :</label>
                <input type="text" name="libelle_role" value="<?php echo $role['libelle_role']; ?>">
            </div>
            <div class="input-group">
                <button type="submit" class="button" name="submit">Modifier</button>
            </div>
        </form>
    </div>
</div>

<?php
        require '../../includes/inc-bottom.php';
    } else {
        echo "Rôle non trouvé.";
    }
} else {
    echo "ID du rôle non spécifié.";
}
?>
