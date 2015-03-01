<?php

/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 28/02/2015
 * Time: 14:32
 */
class Servlet
{

    public function processRequest()
    {
        if (isset($_GET['action']))
        {
            $action = $_GET['action'];
        } else
        {
            $action = "home.php";
        }
        $nextPage = "";

        if ($action == "home")
        {
            $nextPage = "home.php";
        }
        elseif ($action == "viewrecipes")
        {
            $nextPage = "ViewRecipes.php";
        }
        elseif ($action == "viewevents")
        {
            $nextPage = "ViewEvents.php";
        }
        elseif ($action = "createrecipes")
        {
            $nextPage = "CreateRecipes.php";
        }
        elseif ($action = "createevents")
        {
            $nextPage = "CreateEvents.php";
        }
        require_once('Src/Web/' . $nextPage);
    }
}