<?php
/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 28/02/2015
 * Time: 22:45
 */

//require_once "Src/core/Recipe.php";
//require_once "Src/core/Event.php";


class InMemoryDB {



    public $events = array(''); // Push events/recipes
    public $recipes = array('Chicken','Spaghetti');

    public function __construct(){}

    public function addRecipe($recipe)
    {
        array_push($recipes,$recipe);
    }

    public function addEvent($event, $recipe)
    {
        array_push($events,$event);
    }

    public function getRecipes()
    {
        return $this->recipes;
    }

    public function getEvents()
    {
       // return $events;
    }
}
?>