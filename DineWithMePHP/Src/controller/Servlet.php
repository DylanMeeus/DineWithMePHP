<?php

/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 28/02/2015
 * Time: 14:32
 */
require_once "Src/core/Recipe.php";
require_once "Src/core/DWMFacade.php";
class Servlet
{

    private $facade;
    private $recipes;
    //static $servlet = null;

    public function __construct()
    {
        $this->facade = DWMFacade::getInstance();
    }

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
            $this->recipes = $this->facade->getRecipes();
            $nextPage = "ViewRecipes.php";
        }
        elseif ($action == "viewevents")
        {
            $nextPage = "ViewEvents.php";
        }
        elseif ($action == "createrecipes")
        {
            $nextPage = "CreateRecipes.php";
        }
        elseif ($action == "createevents")
        {
            $nextPage = "CreateEvents.php";
        }
        elseif($action=="addRecipe")
        {
            $name = $_POST['name'];
            $people = $_POST['people'];
            $instructions="";
            $ingredients="";

            $newRecipe = new Recipe($name,$people,$instructions,$ingredients);
            $this->facade->addRecipe($newRecipe);
            // Update the recipe list
            //$this->recipes = $this->facade->getRecipes();
            $nextPage="ViewRecipes.php";
            $this->recipes = $this->facade->getRecipes();
        }
        require_once('Src/Web/' . $nextPage);
    }
}