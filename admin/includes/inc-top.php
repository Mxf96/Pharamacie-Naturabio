<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacie NaturaBio</title>
    <link rel="stylesheet" href="/admin/assets/css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <a><h1 class="sitename">Pharmacie NaturaBio</h1></a>
            <a href="/admin/menu.php">Accueil</a>
            <a><img src="/assets/images/logo.png" alt="logo Pharmacie NaturaBio" class="logo"></a>
            <a href="https://anton-et-willem.fr"><img src="/assets/images/logo-anton & willem.png" alt="logo Anton & Willem" class="logo_Anton_et_Willem"></a>
            <ul>
                <?php
                session_start();
                if (isset($_SESSION['id_utilisateur'])) {
                    // Utilisateur connecté
                    echo '<a href="/deconnexion/logout.php">Se déconnecter</a>';
                } else {
                    // Utilisateur déconnecté
                    echo '<a href="/connexion/login.php">Se connecter</a>';
                }
                ?>
            </ul>
            <!-- <i class="fab fa-instagram"></i> -->
            <!-- <i class="fab fa-twitter"></i> -->
        </nav>
    </header>
</body>

</html>