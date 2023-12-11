<?php
require_once 'managers/manager.php';
require 'includes/inc-db-connect.php';

$imagesCategories = getAllImagesCategories($dbh);
$brandImage = getRandomBrandImage($dbh);
$carouselProductImages = getRandomProductImages($dbh);
$carouselProductIds = array_column($carouselProductImages, 'id_produit');
$randomProductImages = getRandomProductImagesExcluding($dbh, $carouselProductIds);

require 'includes/inc-top.php';
?>

<main>
    <div>
        <h1 class="h1">Bienvenue chez Pharmacie NaturaBio</h1>
    </div>

    <!-- Carousel de produits -->
    <div class="carouselContainer">
        <div class="carousel-card-container" id="carouselImages">
            <button id="prevBtn" class="arrow-btn">&lang;</button>
            <?php foreach ($carouselProductImages as $key => $image) : ?>
                <div class="carousel-card" data-index="<?php echo $key; ?>">
                    <img src="/admin/assets/<?php echo $image['url_image']; ?>">
                    <div class="carousel-card-body">
                        <h5 class="card-title centered">
                            <?php echo isset($image['nom_produit']) ? $image['nom_produit'] : ''; ?>
                        </h5>
                        <h5 class="card-title right">
                            <?php echo isset($image['prix_produit']) ? $image['prix_produit'] : ''; ?>€
                        </h5>
                    </div>
                </div>
            <?php endforeach; ?>
            <button id="nextBtn" class="arrow-btn">&rang;</button>
        </div>
    </div>

    <!-- Cadre des images mixtes -->
    <div class="card-container-accueil">
        <!-- Display brand image -->
        <div class="card-accueil">
            <a href="/marques/produitMarque.php?id=<?php echo $brandImage['id_marque']; ?>">
                <div class="image-container">
                    <img class="slide-in-down" src="/admin/assets/<?php echo $brandImage['url_image']; ?>">
                </div>
            </a>
        </div>

        <!-- Display category image -->
        <div class="card-accueil">
            <a href="/categories/produitCategorie.php?id=<?php echo $imagesCategories[0]['id_categorie']; ?>">
                <div class="image-container">
                    <img class="slide-in-down" src="/admin/assets/<?php echo $imagesCategories[0]['url_image']; ?>">
                </div>
            </a>
        </div>

        <!-- Display 2 product images excluding those in the carousel -->
        <?php foreach ($randomProductImages as $productImage) : ?>
            <div class="card-accueil">
                <a href="/nos_produits/ficheProduit.php?id=<?php echo $productImage['id_produit']; ?>">
                    <div class="image-container">
                        <img class="slide-in-down" src="/admin/assets/<?php echo $productImage['url_image']; ?>">
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<script src="managers/scriptCarousel.js"></script>
<?php require 'includes/inc-bottom.php'; ?>