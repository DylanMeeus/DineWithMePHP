<?php
/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 28/02/2015
 * Time: 22:45
 */

//require_once "Src/core/Recipe.php";
//require_once "Src/core/Event.php";

require_once "Src/core/Recipe.php";
require_once "Src/core/Event.php";
require_once "Src/db/IDatabase.php";

class InMemoryDB implements IDatabase
{


    public $events = array(); // Push events/recipes
    public $recipes = array();

    public function __construct()
    {
        // add some dummy recipes
        $recipeOne = new Recipe("Chicken", 4, "Hello", "World");
        $recipeTwo = new Recipe("Noodle soup", 4, "noodles", "add water");
        array_push($this->recipes, $recipeOne, $recipeTwo);

        // dummy events
        $eventOne = new Event($recipeOne, "Dylan");
        $eventTwo = new Event($recipeOne, "Melissa");
        $evenThree = new Event($recipeTwo, "Von Neumann");
        array_push($this->events, $eventOne, $eventTwo, $evenThree);

    }

    public function addRecipe($recipe)
    {
        array_push($this->recipes, $recipe);
    }

    public function addEvent($event, $recipe)
    {
        array_push($this->events, $event);
    }

    public function getRecipes()
    {
        return $this->recipes;
    }

    public function getEvents()
    {
        return $this->events;
    }
}

?>