<?php

function getAllCategories($dbh) {
    $sql = "SELECT * FROM categories ORDER BY id_categorie ASC";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllBrands($dbh) {
    $sql = "SELECT * FROM marques ORDER BY id_marque ASC";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

