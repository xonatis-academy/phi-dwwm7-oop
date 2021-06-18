<?php

abstract class Produit
{
    public $reference;
    public $prix;
    public $image;
    public $description;
    public $nom;
}

class Acheteur
{
    public $nom;
    public $prenom;

    public function acheter(Produit $pachat): Facture
    {
        $fa = new Facture();
        return $fa;
    }
}

class Facture
{
    public $nomProduit;
    public $prixProduit;
}

