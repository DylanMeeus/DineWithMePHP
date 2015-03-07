<?php

/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 28/02/2015
 * Time: 22:38
 */
require_once "Src/core/Recipe.php";
require_once "Src/db/InMemoryDB.php";
require_once "Src/core/DBFactory.php";

class DWMFacade
{

    public $db;
    static $instance = null;

    public function __construct($dbConfig)
    {
        $dbFactory = new DBFactory();
        $this->db = $dbFactory->getDB($dbConfig);
    }

    public function getRecipes()
    {
        return $this->db->getRecipes();
    }

    public function getEvents()
    {
        return $this->db->getEvents();
    }

    public function addRecipe($newRecipe)
    {
        $this->db->addRecipe($newRecipe);
    }

    public function addEvent($newEvent)
    {
        $this->db->addEvent($newEvent);
    }

    public function getRecipeByName($recipeName)
    {
        return $this->db->getRecipeByName($recipeName);
    }

}

?>