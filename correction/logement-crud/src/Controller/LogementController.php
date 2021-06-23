<?php
include DOSSIER_MODELS . '/Logement.php';

class LogementController extends AbstractController implements CrudController
{
    public function verifierPayload(array $data, array $file): ?string
    {
        if (!isset($data['logement-name']) || $data['logement-name'] === '') {
            return "Vous devez spécifier un nom de logement";
        }

        if (!isset($data['logement-price']) || $data['logement-price'] === '') {
            return "Vous devez spécifier un prix de logement";
        }

        if (!is_numeric($data['logement-price'])) {
            return "Le prix doit être numérique";
        }

        if (!isset($data['logement-type']) || $data['logement-type'] === '') {
            return "Vous devez spécifier un prix de logement";
        }

        if (isset($file['logement-photo-file']) && $file['logement-photo-file']['name'] !== '') {
            if (!in_array($file['logement-photo-file']['type'], ['image/webp', 'image/png', 'image/jpg', 'image/jpeg'])) {
                return "Le type de fichier " . $file['logement-photo-file']['type'] . " n'est pris en charge";
            }

            if ($file['logement-photo-file']['size'] > 10000000) {
                return "Le fichier est trop gros: il fait " . $file['logement-photo-file']['size'] . ' octets';
            }
        }

        return null;
    }

    public function verifierPayloadPourModification(array $data): ?string
    {
        if (!isset($data['logement-name']) || $data['logement-name'] === '') {
            return "Vous devez spécifier un nom de logement";
        }

        if (!isset($data['logement-price']) || $data['logement-price'] === '') {
            return "Vous devez spécifier un prix de logement";
        }

        if (!is_numeric($data['logement-price'])) {
            return "Le prix doit être numérique";
        }

        if (!isset($data['logement-type']) || $data['logement-type'] === '') {
            return "Vous devez spécifier un prix de logement";
        }

        return null;
    }

    public function convertirPayloadEnObjet(array $data, array $file): Logement
    {
        $fichier = enregistrerFichierEnvoye($file["logement-photo-file"]);
        $logement = new Logement();
        $logement->setNom($data['logement-name']);
        $logement->setPrix($data['logement-price']);
        $logement->setImage($fichier);
        $logement->setType($data['logement-type']);
        $logement->setDescription($data['logement-description']);

        return $logement;
    }

    // ACTIONS ------------------------------------------------

    public function create()
    {
        $logement = new Logement();
        $messageErreur = null;
        if (isset($_POST['btn-valider'])) {
            $messageErreur = $this->verifierPayload($_POST, $_FILES);
            if ($messageErreur === null) {
                $logement = $this->convertirPayloadEnObjet($_POST, $_FILES);
                $logement->save();
                onVaRediriger('/catalogue');
            }
        }

        include DOSSIER_VIEWS . '/logement/ajouter.html.php';
    }

    public function index()
    {
        $tableau = Logement::all();
        include DOSSIER_VIEWS . '/logement/catalog.html.php';
    }

    public function show()
    {
        if (!isset($_GET['id'])) {
            die();
        }

        $logement = Logement::retrieveByPK($_GET['id']);
        include DOSSIER_VIEWS . '/logement/details.html.php';
    }

    public function delete()
    {
        if (!isset($_GET['id'])) {
            die();
        }

        $logement = Logement::retrieveByPK($_GET['id']);
        $logement->delete();
        onVaRediriger('/catalogue');
    }

    public function update()
    {
        if (!isset($_GET['id'])) {
            die();
        }

        $logement = Logement::retrieveByPK($_GET['id']);

        if (isset($_POST['btn-valider'])) {
            $messageErreur = $this->verifierPayloadPourModification($_POST);

            if ($messageErreur === null) {
                $logement->setNom($_POST['logement-name']);
                $logement->setPrix($_POST['logement-price']);
                $logement->setType($_POST['logement-type']);
                $logement->setDescription($_POST['logement-description']);
                $logement->save();
                onVaRediriger('/catalogue');
            } else {
                include DOSSIER_VIEWS . '/logement/modifier.html.php';
            }
        } else {
            $messageErreur = null;
            include DOSSIER_VIEWS . '/logement/modifier.html.php';
        }
    }
}
