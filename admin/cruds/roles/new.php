<?php
require '../../../includes/inc-db-connect.php';
require '../../managers/role-manager.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $libelle_role = strip_tags(trim(htmlspecialchars($_POST['libelle_role'])));

    insertRole($dbh, $libelle_role);

    header("Location: index.php");
    exit();
}

require '../../includes/inc-top-form.php';
?>

<div class="container">
    <div class="login-box">
        <a href="/admin/cruds/roles/index.php" class="btn btn-info btn-block">Retour</a>
        <h1>Ajouter un nouveau rôle</h1>
        <form action="" method="post">
            <div class="input-group">
                <label>Libellé du rôle : </label>
                <input type="text" name="libelle_role">
            </div>
            <div class="input-group">
                <button type="submit" class="button" name="submit">Ajouter</button>
            </div>
        </form>
    </div>
</div>

