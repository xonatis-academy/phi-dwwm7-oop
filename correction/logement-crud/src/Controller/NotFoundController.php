<?php

namespace App\Controller {

    class NotFoundController extends AbstractController
    {
        public function index()
        {
            include DOSSIER_VIEWS . '/404.html.php';
        }
    }
}
