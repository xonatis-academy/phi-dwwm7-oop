<?php

// abstract : On en trouve rien dans le monde réel, qui soit **juste** des Produit
abstract class Produit {

    public $prix;
    public $nom;
    public $reference;   
    public $marque;

}

abstract class ProduitElectronique extends Produit {


}

interface SaitPrendreEnPhoto {
    
    function prendreEnPhoto();

}

interface SaitTelephoner {

    function appeler();

}

class Telephone extends ProduitElectronique implements SaitPrendreEnPhoto, SaitTelephoner {
    
    public $model;
    public $memoire;

    public function prendreEnPhoto()
    {
        
    }

    public function appeler()
    {
        
    }

}

class AppareilPhoto implements SaitPrendreEnPhoto {


    public function prendreEnPhoto()
    {
        
    }

}

// Ce qu'un objet doit savoir faire : EXIGENCES
interface SaitChauffer {

    function rechauffer();
    function decongeler(Produit $poj);

}

class MicroOnde extends ProduitElectronique implements SaitChauffer {

    public $puissance;
    public $dimensions;

    public function rechauffer()
    {
        
    }

    public function decongeler(Produit $poj)
    {
        
    }

}

class BonDeCommande
{
    public $numeroProduit;
    public $date;
    public $quantity;
    public $prixTotal;
    public $nomProduit;
    public $nomDuVendeur;
}

abstract class Employe {
    public $nom;
    public $prenom;
    public $matricule;
}

class Vendeur extends Employe
{
    private $partiPolitique;

    function __construct()
    {
        $this->partiPolitique = 'laEstBelle';
    }

    // vendre un $objet Produit avec une quantité, c'est donner un bon de commande
    public function vendre(Produit $poj, int $quantite): BonDeCommande 
    {
        $bon = new BonDeCommande();

        $bon->numeroProduit = $poj->reference;
        $bon->nomProduit = $poj->nom;
        $bon->date = new DateTime();
        $bon->quantity = $quantite;
        $bon->prixTotal = $poj->prix * $quantite;
        $bon->nomDuVendeur = $this->nom . ' ' . $this->prenom;

        return $bon;
    }
}


class Stagiaire extends Employe
{
    public function vendre(Produit $poj, int $quantite): BonDeCommande
    {
        $noizu = new BonDeCommande();

        $noizu->numeroProduit = $poj->reference;
        $noizu->prixTotal = $poj->prix * $quantite;
        $noizu->nomDuVendeur = $this->nom . ' ' . $this->prenom;

        return $noizu;
    }
}

$telephone = new Telephone();
$telephone->prix = 369;
$telephone->nom = 'Chaomee';
$telephone->reference = 'A923722';

$micro = new MicroOnde();
$micro->prix = 999;
$micro->nom = 'Micro onde extra';
$micro->reference = 'IOZ93873';
$micro->puissance = '600W';

$jose = new Vendeur();
$jose->nom = 'Caliente';
$jose->prenom = 'Jose';

$rosalie = new Vendeur();
$rosalie->nom = 'Ttaaa';
$rosalie->prenom = 'Rosalie';

$rosalie2 = new Vendeur();
$rosalie2->nom = 'Ttaaa';
$rosalie2->prenom = 'Rosalie';

$samba = new Stagiaire();
$samba->nom = 'Roi';
$samba->prenom = 'Samba';

$bon = $jose->vendre($telephone, 3);
var_dump($bon);

$bon2 = $samba->vendre($telephone, 3);
var_dump($bon2);