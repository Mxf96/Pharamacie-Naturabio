<?php
session_start();
require_once 'include-manager.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacie NaturaBio</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="/index.php"><h1 class="sitename">Pharmacie NaturaBio</h1></a>
            <a href="/index.php"><img src="/assets/images/logo.png" alt="logo Pharmacie NaturaBio" class="logo"></a>
            <a href="https://anton-et-willem.fr"><img src="/assets/images/logo-anton & willem.png" alt="logo Anton & Willem" class="logo_Anton_et_Willem"></a>
            <a href="/index.php">Accueil</a>
            <a href="/nos_produits/index.php">Nos Produits</a>
            <div class="dropdown">
                <a href="/categories/index.php">Catégories</a>
                <div class="dropdown-content">
                    <?php
                    $categories = getAllCategories($dbh);
                    foreach ($categories as $category) { ?>
                        <a href="/categories/produitCategorie.php?id=<?php echo $category['id_categorie']; ?>">
                            <?php echo $category['nom_categorie']; ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div class="dropdown">
                <div class="dropdown">
                    <a href="/marques/index.php">Marques</a>
                    <div class="dropdown-content">
                        <?php
                        $brands = getAllBrands($dbh);
                        foreach ($brands as $brand) { ?>
                            <a href="/marques/produitMarque.php?id=<?php echo $brand['id_marque']; ?>">
                                <?php echo $brand['nom_marque']; ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            </div>
            <ul>
                <a href="/liste_shouhait/maliste.php">Ma liste&nbsp;<i class="fa fa-list"></i></a>
                <?php
                if (isset($_SESSION['id_utilisateur'])) {
                    echo '<a href="/deconnexion/logout.php">Se déconnecter</a>';
                } else {   
                    echo '<a href="/connexion/login.php">Se connecter</a>';
                }
                ?>
            </ul>
        </nav>
    </header>
    <div id="background-image"></div>
