<?php
require_once '../includes/inc-db-connect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacie NaturaBio - Inscription</title>
    <link rel="stylesheet" href="/assets/css/styleslogin.css">
</head>
<body>
    <div class="container">
        <div class="register-box">
            <a href="/connexion/login.php">Retour</a>
            <h1>Inscription</h1>
            <form action="register-POST.php" method="POST">
                <div class="input-group">
                    <label>Nom:</label>
                    <input type="text" name="nom_utilisateur">
                </div>
                <div class="input-group">
                    <label>Prénom:</label>
                    <input type="text" name="prenom_utilisateur">
                </div>
                <div class="input-group">
                    <label>Email:</label>
                    <input type="email" name="email_utilisateur">
                </div>
                <div class="input-group">
                    <label>Mot de passe:</label>
                    <input type="password" name="mdp_utilisateur">
                </div>
                <div class="input-group">
                    <label>Confirmation du mot de passe:</label>
                    <input type="password" name="mdp_confirmation">
                </div>
                <div class="input-group">
                    <input type="submit" class="button" name="submit" value="Inscription">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
