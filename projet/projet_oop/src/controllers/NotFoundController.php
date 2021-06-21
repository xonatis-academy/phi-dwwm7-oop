<?php

/**
 * 1. Créer une classe vide
 * 2. Déplacer les fonctions dans la classe
 * 3. Mettre les méthodes en public
 * 4. Regarder s'il y a des appels à des méthodes de cette classe, dans ce cas la, on utilise $this->
 */

class NotFoundController extends AbstractController
{
    public function index()
    {
        include DOSSIER_VIEWS . '/404.html.php';
    }
}
