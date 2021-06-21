<?php

/**
 * 1. Créer une classe vide
 * 2. Déplacer les fonctions dans la classe
 * 3. Mettre les méthodes en public
 * 4. Regarder s'il y a des appels à des méthodes de cette classe, dans ce cas la, on utilise $this->
 */

include DOSSIER_MODELS.'/Produit.php';

class ProductController extends AbstractController implements CrudController
{
    public function verifierPayload(array $data, array $file): ?string
    {
        if (!isset($data['product-name']) || $data['product-name'] === '')
        {
            return "Vous devez spécifier un nom de produit";
        }
    
        if (!isset($data['product-price']) || $data['product-price'] === '')
        {
            return "Vous devez spécifier un prix de produit";
        }
    
        if (!is_numeric($data['product-price']))
        {
            return "Le prix doit être numérique";
        }
    
        if (!isset($data['product-type']) || $data['product-type'] === '')
        {
            return "Vous devez spécifier un prix de produit";
        }
    
        if (isset($file['product-photo-file']) && $file['product-photo-file']['name'] !== '')
        {
            if (!in_array($file['product-photo-file']['type'], ['image/webp', 'image/png', 'image/jpg', 'image/jpeg']))
            {
                return "Le type de fichier " . $file['product-photo-file']['type'] . " n'est pris en charge";
            }
    
            if ($file['product-photo-file']['size'] > 10000000)
            {
                return "Le fichier est trop gros: il fait " . $file['product-photo-file']['size']. ' octets';
            }
        }
    
        return null;
    }
    
    public function verifierPayloadPourModification(array $data): ?string
    {
        if (!isset($data['product-name']) || $data['product-name'] === '')
        {
            return "Vous devez spécifier un nom de produit";
        }
    
        if (!isset($data['product-price']) || $data['product-price'] === '')
        {
            return "Vous devez spécifier un prix de produit";
        }
    
        if (!is_numeric($data['product-price']))
        {
            return "Le prix doit être numérique";
        }
    
        if (!isset($data['product-type']) || $data['product-type'] === '')
        {
            return "Vous devez spécifier un prix de produit";
        }
    
        return null;
    }
    
    public function convertirPayloadEnObjet(array $data, array $file): Produit
    {
        $fichier = enregistrerFichierEnvoye($file["product-photo-file"]);
        $produit = new Produit();
        $produit->setNom($data['product-name']);
        $produit->setPrix($data['product-price']);
        $produit->setImage($fichier);
        $produit->setType($data['product-type']);
        $produit->setDescription($data['product-description']);
    
        return $produit;
    }
    
    // ACTIONS ------------------------------------------------
    
    public function create()
    {
        $produit = new Produit();
        $messageErreur = null;
        if (isset($_POST['btn-valider']))
        {
            $messageErreur = $this->verifierPayload($_POST, $_FILES);
            if ($messageErreur === null)
            {
                $produit = $this->convertirPayloadEnObjet($_POST, $_FILES);
                $produit->save();
                onVaRediriger('/catalogue');
            }
        }
    
        include DOSSIER_VIEWS.'/produit/ajouter.html.php';
    }
    
    public function index()
    {
        $tableau = Produit::all();
        include DOSSIER_VIEWS.'/produit/catalog.html.php';
    }
    
    public function show()
    {
        if (!isset($_GET['id']))
        {
            die();
        }
    
        $produit = Produit::retrieveByPK($_GET['id']);
        include DOSSIER_VIEWS.'/produit/details.html.php';
    }
    
    public function delete()
    {
        if (!isset($_GET['id']))
        {
            die();
        }
    
        $produit = Produit::retrieveByPK($_GET['id']);
        $produit->delete();
        onVaRediriger('/catalogue');
    }
    
    public function update()
    {
        if (!isset($_GET['id']))
        {
            die();
        }
    
        $produit = Produit::retrieveByPK($_GET['id']);
    
        if (isset($_POST['btn-valider']))
        {
            $messageErreur = $this->verifierPayloadPourModification($_POST);
    
            if ($messageErreur === null)
            {
                $produit->setNom($_POST['product-name']);
                $produit->setPrix($_POST['product-price']);
                $produit->setType($_POST['product-type']);
                $produit->setDescription($_POST['product-description']);
                $produit->save();
                onVaRediriger('/catalogue');
            }
            else
            {
                include DOSSIER_VIEWS.'/produit/modifier.html.php';
            }
        }
        else
        {
            $messageErreur = null;
            include DOSSIER_VIEWS.'/produit/modifier.html.php';
        }
    }
}