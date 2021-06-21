<?php
// Définitions des constantes
const DOSSIER_VIEWS = __DIR__.'/views';
const DOSSIER_CONTROLLERS = __DIR__.'/src/controllers';
const DOSSIER_MODELS = __DIR__.'/src/models';

// Connexion à la base de données
include __DIR__.'/SimpleOrm.class.php';
$conn = new mysqli('localhost', 'debian-sys-maint', '23Y4T4fR6fWLswjY');
SimpleOrm::useConnection($conn, 'eval_oop');

// Inclusion des fonctions réutilisables
include __DIR__.'/functions.php';

// Déclaration des routes
if (isset($_SERVER['PATH_INFO']) == false) 
{
    require DOSSIER_CONTROLLERS.'/logement.php';
    index();
} else if ($_SERVER['PATH_INFO'] == '/ajouter-logement')
{
    require DOSSIER_CONTROLLERS.'/logement.php';
    create();
} else if ($_SERVER['PATH_INFO'] == '/catalogue')
{
    require DOSSIER_CONTROLLERS.'/logement.php';
    index();
} else if ($_SERVER['PATH_INFO'] == '/details-logement')
{
    require DOSSIER_CONTROLLERS.'/logement.php';
    show();
} else if ($_SERVER['PATH_INFO'] == '/supprimer-logement')
{
    require DOSSIER_CONTROLLERS.'/logement.php';
    delete();
} else if ($_SERVER['PATH_INFO'] == '/modifier-logement')
{
    require DOSSIER_CONTROLLERS.'/logement.php';
    update();
} else
{
    require DOSSIER_CONTROLLERS.'/notfound.php';
    index();
}
