<?php

/* Imports */
require_once __DIR__ . "/class/Product.class.php";
require_once __DIR__ . "/class/Book.class.php";
require_once __DIR__ . "/class/VideoGame.class.php";
require_once __DIR__ . "/class/VirtualProd.class.php";

/* Alias */

use \Products\Book;
use \Products\VideoGame;
use \Virtual\Product as VProduct;

/* Traitement de la requête si le verbe HTTP est POST */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* Récupération des valeurs du body de la requête */
    $price = $_POST["price"];
    $vat_rate = $_POST["vat_rate"];
    $name = $_POST["name"];
    $stock = $_POST["stock"];
    $category = $_POST["category"];
    $description = $_POST["description"];
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Atelier 10 : E-commerce partie 6</title>
</head>

<body>
    <form action="index.php" method="POST">
        <input type="number" name="price" placeholder="Prix HT" step="0.01" required />
        <input type="number" name="vat_rate" placeholder="Taux de TVA" step="0.1" required />
        <input type="text" name="name" placeholder="Nom" required />
        <input type="number" name="stock" placeholder="Stock" required />

        <select name="category">
            <option value="book">Livre</option>
            <option value="videoGame">Jeu vidéo</option>
            <option value="other">Autre</option>
        </select>

        <textarea name="description"></textarea>

        <input type="submit" value="valider" />

    </form>

    <?php


    /* Création d'un livre */
    ?>
    <h3>Nouveau livre :</h3>
    <?php
    $livre1 = new Book(10, "Vingt Mille Vieux Sous Les Mères", 10, "Livres", "Un livre vraiment trop bien !", "Vules Jerne", "poche");

    $livre1->show();

    /* Création d'un jeu vidéo */
    ?>
    <h3>Nouveau jeu vidéo :</h3>
    <?php
    $jeu1 = new VideoGame(10, "Le jeu de la folyyyyyy", 50, "Jeu-vidéo", "Un jeu de ouf malade :o", "MMO-single move ultra zbire powaa", 18, 15);

    $jeu1->show();


    /* Création d'un produit virtuel */
    ?>
    <h3>Nouveau produit virtuel :</h3>
    <?php
    $virtualProd1 = new VProduct("Nom du produit virutel", "Voici la description du produit virtuel.");

    $virtualProd1->show();
    ?>
</body>

</html>