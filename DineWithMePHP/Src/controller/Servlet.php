<?php

/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 28/02/2015
 * Time: 14:32
 */
require_once "Src/core/Recipe.php";
require_once "Src/core/DWMFacade.php";
require_once "Src/core/Event.php";

class Servlet
{

    private $facade;
    private $recipes;
    private $events;

    //static $servlet = null;

    public function __construct($dbConfig)
    {
        /*session_start();
        if (isset($_SESSION['facade']))
        {
            $this->facade = $_SESSION['facade'];
        } else
        {*/
            $this->facade = new DWMFacade($dbConfig);
        //    $_SESSION['facade'] = $this->facade;
        //}
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
        } elseif ($action == "viewrecipes")
        {
            $this->recipes = $this->facade->getRecipes();
            $nextPage = "ViewRecipes.php";
        } elseif ($action == "viewevents")
        {
            $this->recipes = $this->facade->getRecipes();
            $this->events = $this->facade->getEvents();
            $nextPage = "ViewEvents.php";
        } elseif ($action == "addRecipe")
        {
            $name = $_POST['name'];
            $people = $_POST['people'];
            $newRecipe = new Recipe($name, $people);
            $this->facade->addRecipe($newRecipe);
            // Update the recipe list
            //$this->recipes = $this->facade->getRecipes();
            $nextPage = "ViewRecipes.php";
            $this->recipes = $this->facade->getRecipes();
        } elseif ($action == 'addEvent')
        {
            $host = $_POST['host'];
            $recipename = $_POST['selectedRecipe'];
            $recipe = $this->facade->getRecipeByName($recipename);
            $newEvent = new Event($recipe, $host);
            // test
            $this->facade->addEvent($newEvent);
            $this->events = $this->facade->getEvents();
            $nextPage = "ViewEvents.php";
        }
        require_once('Src/Web/' . $nextPage);
    }
}