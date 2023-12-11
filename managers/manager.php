<?php
// Inclusion du fichier de connexion à la base de données
require 'includes/inc-db-connect.php';


function getAllImagesCategories($dbh) {
    $sql = "SELECT images.id_image, images.url_image, categories.nom_categorie, categories.id_categorie
            FROM images
            JOIN categories ON images.id_categorie = categories.id_categorie
            GROUP BY images.id_categorie
            ORDER BY RAND()
            LIMIT 2";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getRandomBrandImage($dbh) {
    $sql = "SELECT id_marque, url_image FROM images WHERE id_marque IS NOT NULL ORDER BY RAND() LIMIT 1";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getRandomProductImages($dbh, $limit = 6) {
    $sql = "SELECT images.url_image, images.id_produit, produits.nom_produit, produits.prix_produit
            FROM images 
            JOIN produits ON images.id_produit = produits.id_produit
            WHERE images.id_produit > 0 
            ORDER BY RAND() 
            LIMIT " . intval($limit);
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getRandomProductImagesExcluding($dbh, $excludeIds, $limit = 2) {
    $excludeIds = implode(",", $excludeIds);
    $sql = "SELECT url_image, id_produit FROM images WHERE id_produit > 0 AND id_produit NOT IN ($excludeIds) ORDER BY RAND() LIMIT " . intval($limit);
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
