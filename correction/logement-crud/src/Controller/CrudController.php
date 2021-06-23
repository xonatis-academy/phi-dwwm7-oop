<?php

namespace App\Controller {

    interface CrudController
    {
        function index();
        function create();
        function show();
        function delete();
        function update();
    }
    

}