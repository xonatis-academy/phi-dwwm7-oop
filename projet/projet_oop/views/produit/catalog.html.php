<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>

    <div class="container">
    <h1 class="display-4 text-center">Liste des produits</h1>
    <div class="text-center m-5">
        <a href="/projet_oop/router.php/ajouter-produit" class="btn btn-primary">Ajouter un nouveau produit</a> 
    </div>
        <table class="table table-striped w-75 mx-auto">
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Image</th>
                <th>Type</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>

            <?php
            foreach ($tableau as $element) {
            ?>

                <tr>
                    <td class="w-25"><?php echo $element->getNom() ?></td>
                    <td><?php echo $element->getPrix() ?> euros</td>
                    <td>
                        <img class="w-100" src="/projet_oop<?php echo $element->getImage() ?>" />
                    </td>
                    <td><?php echo $element->getType() ?></td>
                    <td><?php
                        $taille = strlen($element->getDescription());
                        if ($taille > 25) 
                        {
                            echo substr($element->getDescription(), 0, 25) . '...';
                        }
                        else
                        {
                            echo $element->getDescription();
                        }
                        
                    ?></td>
                    <td>
                        <a href="/projet_oop/router.php/details-produit?id=<?php echo $element->getId() ?>" class="btn btn-primary">Détails</a> 
                        <a href="/projet_oop/router.php/modifier-produit?id=<?php echo $element->getId() ?>" class="btn btn-primary">Modifier</a> 
                        <a href="/projet_oop/router.php/supprimer-produit?id=<?php echo $element->getId() ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>

            <?php
            }
            ?>

        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>