<?php

/**
 * Q5 : Nous allons exiger des controllers CRUD d'implémenter 
 * une interface CrudController avec les méthodes adéquates 
 * à déclarer. Créer une interface CrudController.php avec 
 * les méthodes adéquqtes
 */

interface CrudController
{
    function index();
    function show();
    function delete();
    function create();
    function update();
}
