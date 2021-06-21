<?php

/**
 * 1. Créer une classe vide
 * 2. Déplacer les fonctions dans la classe
 * 3. Mettre les méthodes en public
 * 4. Regarder s'il y a des appels à des méthodes de cette classe, dans ce cas la, on utilise $this->
 */

include DOSSIER_MODELS.'/User.php';

class UserController extends AbstractController implements CrudController
{

    public function verifierPayload(array $data, array $file): ?string
    {
        if (!isset($data['user-lastname']) || $data['user-lastname'] === '') {
            return "Vous devez spécifier un nom";
        }

        if (!isset($data['user-firstname']) || $data['user-firstname'] === '') {
            return "Vous devez spécifier un prenom";
        }

        if (!isset($data['user-role']) || $data['user-role'] === '') {
            return "Vous devez spécifier un role";
        }

        if (!isset($data['user-email']) || $data['user-email'] === '') {
            return "Vous devez spécifier un email";
        }

        if (!isset($data['user-password']) || $data['user-password'] === '') {
            return "Vous devez spécifier un mot de passe";
        }

        if (isset($file['user-photo-file']) && $file['user-photo-file']['name'] !== '') {
            if (!in_array($file['user-photo-file']['type'], ['image/webp', 'image/png', 'image/jpg', 'image/jpeg'])) {
                return "Le type de fichier " . $file['user-photo-file']['type'] . " n'est pris en charge";
            }

            if ($file['user-photo-file']['size'] > 10000000) {
                return "Le fichier est trop gros: il fait " . $file['user-photo-file']['size'] . ' octets';
            }
        }

        return null;
    }

    public function convertirPayloadEnObjet(array $data, array $file): User
    {
        $fichier = $file ? enregistrerFichierEnvoye($file["user-photo-file"]) : '';
        $user = new User();
        $user->setNom($data['user-lastname']);
        $user->setPrenom($data['user-firstname']);
        $user->setImage($fichier);
        $user->setRole($data['user-role']);
        $user->setEmail($data['user-email']);
        $user->setMotDePasse($data['user-password']);

        return $user;
    }

    // ACTIONS ------------------------------------------------

    public function create()
    {
        $user = new User();
        $messageErreur = null;
        if (isset($_POST['btn-valider'])) {
            $messageErreur = $this->verifierPayload($_POST, $_FILES);
            if ($messageErreur === null) {
                $user = $this->convertirPayloadEnObjet($_POST, $_FILES);
                $user->save();
                onVaRediriger('/liste');
            }
        }

        include DOSSIER_VIEWS . '/user/page1.html.php';
    }

    public function index()
    {
        $tableau = User::all();
        include DOSSIER_VIEWS . '/user/page9.html.php';
    }

    public function show()
    {
        if (!isset($_GET['id'])) {
            die();
        }

        $user = User::retrieveByPK($_GET['id']);
        include DOSSIER_VIEWS . '/user/page6.html.php';
    }

    public function delete()
    {
        if (!isset($_GET['id'])) {
            die();
        }

        $user = User::retrieveByPK($_GET['id']);
        $user->delete();
        onVaRediriger('/liste');
    }

    public function update()
    {
        // Exercice 2 : Récupération du mendiant à modifier
        if (!isset($_GET['id'])) {
            die();
        }

        $user = User::retrieveByPK($_GET['id']);

        if (isset($_POST['btn-valider'])) {
            // Exercice 3 : Modification des propriétés de l'objet
            $user->setNom($_POST['user-lastname']);
            $user->setPrenom($_POST['user-firstname']);
            $user->setRole($_POST['user-role']);
            $user->setEmail($_POST['user-email']);
            $user->setMotDePasse($_POST['user-password']);

            // Exercice 4 : Sauvegarder l'objet en base de données
            $user->save();
        }

        // Afficher la vue
        include DOSSIER_VIEWS . '/user/modifier.html.php';
    }
}
