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
        $recipeOne = new Recipe("Chicken", 4);
        $recipeTwo = new Recipe("Noodle soup", 4);
        addRecipe($recipeOne);
        addRecipe($recipeTwo);

        // dummy events
        $eventOne = new Event($recipeOne, "Dylan");
        $eventTwo = new Event($recipeOne, "Melissa");
        $evenThree = new Event($recipeTwo, "Von Neumann");
        array_push($this->events, $eventOne, $eventTwo, $evenThree);

    }

    public function addRecipe($recipe)
    {
        $recipeID = count($this->recipes);
        $recipe->setID($recipeID);
        $this->recipes[$recipeID] = $recipe;
    }

    public function addEvent($event)
    {
        $eventID = count($this->events);
        $event->setID($eventID);
        $this->events[$eventID] = $event;
    }

    public function getRecipes()
    {
        return array_values($this->recipes);
        //return $this->recipes;
    }

    public function getEvents()
    {
        return $this->events;
    }

    public function getRecipeByName($recipeName)
    {
        foreach ($this->recipes as $recipe)
        {
            if ($recipe->getName() == $recipeName)
            {
                return $recipe;
            }
        }
        return null;
    }

    public function deleteRecipe($id){}
    public function deleteEvent($eventID){}

}

?>