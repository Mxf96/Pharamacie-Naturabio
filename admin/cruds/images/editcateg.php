<?php
require '../../managers/image-manager.php';
require '../../../includes/inc-db-connect.php';

$id = $_GET['id_image'];
$image = getImageById($dbh, $id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url_image = $_POST['url_image'];
    updateCategoryImage($dbh, $id, $url_image);
    header("Location: index.php");
}

require '../../includes/inc-top-form.php';
?>
<div class="container">
    <div class="login-box">
        <a href="/admin/cruds/images/index.php" class="btn btn-info btn-block">Retour</a>
        <h1 class="h1">Modifier l'image de la catégorie</h1>
        <form method="post">
            <div class="input-group">
                <label for="url_image">URL de l'image :</label>
            </div>
            <div class="input-group">
                <input type="file" id="url_image" name="url_image" value="<?= $image['url_image'] ?>">
            </div>
            <div class="input-group">
                <button type="submit">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>