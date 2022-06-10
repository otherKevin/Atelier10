<?php

//namespace Products;

// Import :
require_once  "./interface/Product.interface.php";

/**
 * Classe produit : abstraite
 */

abstract class Product implements IProduit
{

    /* Propriétés */
    protected float $price; // Prix HT
    public float $vat_rate; // Taux de TVA
    protected float $price_with_vat; // Prix TTC
    public string $name; // Nom
    public int $stock; // Stock
    public string $category; // Catégorie
    public string $description; // Description

    /**
     * Constructeur
     */
    public function __construct(float $price, float $vat_rate, string $name, int $stock, string $category, string $description)
    {
        $this->price = $price;
        $this->vat_rate = $vat_rate;
        $this->price_with_vat = $price * (1 + ($vat_rate / 100));
        $this->name = $name;
        $this->stock = $stock;
        $this->category = $category;
        $this->description = $description;
    }

    /**
     * Méthode de calcul de la valorisation du stock
     */
    public function stockValue(): float
    {
        return $this->price * $this->stock;
    }

    /**
     * Getter
     * Methode permettant de récupérer le prix HT en chaîne de caractères aggrémentée pour l'affichage
     */
    public function getPrice(): string
    {
        return number_format($this->price, 2) . "€ HT";
    }

    /**
     * Getter
     * Méthode permettant de récupérer le prix HT tout simplement 
     */
    public function getPurePrice(): float
    {
        return $this->price;
    }

    /**
     * Getter
     * Methode permettant de récupérer le prix TTC
     */
    public function getPriceWithVAT(): string
    {
        return number_format($this->price_with_vat, 2) . "€ TTC";
    }

    /**
     * Affichage des données du produit
     */
    public abstract function show(): void;


    /**
     * Méthode statique de clonage
     */

    public static function cloning(Product $prodToClone, string $nameOfClone): Product
    {

        if (isset($prodToClone)) {

            return new Product($prodToClone->price, $prodToClone->vat_rate, $nameOfClone, $prodToClone->stock, $prodToClone->category, "");
        } else {
            echo "Le produit à cloner doit préalablement exister.";
            return false;
        }
    }
}
