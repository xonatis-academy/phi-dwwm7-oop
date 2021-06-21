<?php
// Définitions des constantes
const DOSSIER_VIEWS = __DIR__.'/views';
const DOSSIER_CONTROLLERS = __DIR__.'/src/controllers';
const DOSSIER_MODELS = __DIR__.'/src/models';

// Connexion à la base de données
include __DIR__.'/SimpleOrm.class.php';
$conn = new mysqli('localhost', 'debian-sys-maint', '23Y4T4fR6fWLswjY');
SimpleOrm::useConnection($conn, 'projet_oop');

// Inclusion des fonctions réutilisables
include DOSSIER_MODELS.'/Entity.php';
include DOSSIER_CONTROLLERS.'/AbstractController.php';
include DOSSIER_CONTROLLERS.'/CrudController.php';
include DOSSIER_CONTROLLERS.'/UserController.php';
include DOSSIER_CONTROLLERS.'/ProduitController.php';
include DOSSIER_CONTROLLERS.'/NotFoundController.php';
include __DIR__.'/functions.php';

// Déclaration des routes
if (isset($_SERVER['PATH_INFO']) == false) 
{
    $cusinier = new UserController();
    $cusinier->index();
} else if ($_SERVER['PATH_INFO'] == '/inscription')
{
    $cusinier = new UserController();
    $cusinier->create();
} else if ($_SERVER['PATH_INFO'] == '/liste')
{
    $cusinier = new UserController();
    $cusinier->index();
} else if ($_SERVER['PATH_INFO'] == '/details-utilisateur')
{
    $cusinier = new UserController();
    $cusinier->show();
} else if ($_SERVER['PATH_INFO'] == '/supprimer-utilisateur')
{
    $cusinier = new UserController();
    $cusinier->delete();
} 
else if ($_SERVER['PATH_INFO'] == '/modifier-mendiant')
{
    $cusinier = new UserController();
    $cusinier->update();
} else if ($_SERVER['PATH_INFO'] == '/ajouter-produit')
{
    $cusinier = new ProductController();
    $cusinier->create();
} else if ($_SERVER['PATH_INFO'] == '/catalogue')
{
    $cusinier = new ProductController();
    $cusinier->index();
} else if ($_SERVER['PATH_INFO'] == '/details-produit')
{
    $cusinier = new ProductController();
    $cusinier->show();
} else if ($_SERVER['PATH_INFO'] == '/supprimer-produit')
{
    $cusinier = new ProductController();
    $cusinier->delete();
} else if ($_SERVER['PATH_INFO'] == '/modifier-produit')
{
    $cusinier = new ProductController();
    $cusinier->update();
}
else
{
    $cusinier = new NotFoundController();
    $cusinier->index();
}
