<?php
// Définitions des constantes
const DOSSIER_VIEWS = __DIR__.'/templates';
const DOSSIER_CONTROLLERS = __DIR__.'/src/Controller';
const DOSSIER_MODELS = __DIR__.'/src/Entity';

// Connexion à la base de données
include __DIR__.'/vendor/SimpleOrm.class.php';
$conn = new mysqli('localhost', 'debian-sys-maint', '23Y4T4fR6fWLswjY');
SimpleOrm::useConnection($conn, 'eval_oop');

// Inclusion des fonctions réutilisables
include DOSSIER_MODELS.'/Entity.php';
include DOSSIER_CONTROLLERS.'/AbstractController.php';
include DOSSIER_CONTROLLERS.'/CrudController.php';
include DOSSIER_CONTROLLERS.'/LogementController.php';
include DOSSIER_CONTROLLERS.'/NotFoundController.php';
include __DIR__.'/vendor/functions.php';

// Déclaration des routes
if (isset($_SERVER['PATH_INFO']) == false) 
{
    $controller = new LogementController();
    $controller->index();
} else if ($_SERVER['PATH_INFO'] == '/ajouter-logement')
{
    $controller = new LogementController();
    $controller->create();
} else if ($_SERVER['PATH_INFO'] == '/catalogue')
{
    $controller = new LogementController();
    $controller->index();
} else if ($_SERVER['PATH_INFO'] == '/details-logement')
{
    $controller = new LogementController();
    $controller->show();
} else if ($_SERVER['PATH_INFO'] == '/supprimer-logement')
{
    $controller = new LogementController();
    $controller->delete();
} else if ($_SERVER['PATH_INFO'] == '/modifier-logement')
{
    $controller = new LogementController();
    $controller->update();
} else
{
    $controller = new NotFoundController();
    $controller->index();
}
