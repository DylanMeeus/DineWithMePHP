<?php

/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 7/03/2015
 * Time: 14:26
 */

require_once "Src/db/IDatabase.php";
require_once "Src/core/Recipe.php";

class PSQLDB implements IDatabase
{

    public $DB;

    public function __construct($dbConfig)
    {

        $connString = $dbConfig['driver'] . ':';
        foreach ($dbConfig['properties'] as $key => $value)
        {
            $connString .= $key . '=' . $value . ';';
        }
        try
        {
            // $this->DB = new PDO($connString, $dbConfig['username'], $dbConfig['password']);

            $this->DB = new PDO($connString, $dbConfig['username'], $dbConfig['password']);
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex)
        {
            error_log($connString);
        }

    }

    public function getEvents()
    {
        $query = "select * from recipes inner join events on recipes.recipeid = events.recipe";
        $statement = null;
        $statement = $this->DB->prepare($query);
        $statement->execute();

        // get result
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $result = $statement->fetchAll();

        $events = array();
        foreach ($result as $row)
        {
            $recipe = new Recipe($row['recipename'], $row['people']);
            $recipe->setID($row['recipeid']);
            $event = new Event($recipe, $row['host']);
            $event->setID($row['eventid']);
            array_push($events, $event);
        }
        return $events;
    }

    public function getRecipes()
    {

        //end test
        $query = "SELECT * FROM RECIPES";
        $statement = null;
        $statement = $this->DB->prepare($query);
        $statement->execute();

        // get result
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $result = $statement->fetchAll();

        $recipes = array();
        foreach ($result as $row)
        {
            $recipe = new Recipe($row['recipename'], $row['people']);
            $recipe->setID($row['recipeid']);
            array_push($recipes, $recipe);
        }

        return $recipes;

    }

    public function addRecipe($recipe)
    {
        $query = 'insert into recipes(recipename,people) values(:recipename, :people)';
        $statement = null;
        $statement = $this->DB->prepare($query);

        $args = array(
            ':recipename' => $recipe->getName(),
            ':people' => $recipe->getPeople()
        );
        $statement->execute($args);

    }

    public function addEvent($event)
    {
        $query = 'insert into events(host,recipe) values(:host, :recipe)';
        $statement = null;
        $statement = $this->DB->prepare($query);

        $args = array(
            ':host' => $event->getHost(),
            ':recipe' => $event->getRecipe()->getID()
        );

        $statement->execute($args);
    }

    public function getRecipeByName($recipeName)
    {

        // fetch all recipes and store in recipes;
        $query = "SELECT * FROM RECIPES";
        $statement = null;
        $statement = $this->DB->prepare($query);
        $statement->execute();

        // get result
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $result = $statement->fetchAll();

        $recipes = array();
        foreach ($result as $row)
        {
            $recipe = new Recipe($row['recipename'], $row['people']);
            $recipe->setID($row['recipeid']);
            array_push($recipes, $recipe);
        }


        foreach ($recipes as $recipe)
        {
            if ($recipe->getName() == $recipeName)
            {
                return $recipe;
            }
        }
        return null;
    }

    public function deleteRecipe($id)
    {
        $query = "delete from events where recipe = " . $id;
        $statement = null;
        $statement = $this->DB->prepare($query);
        $statement->execute();

        $query = "delete from recipes where recipeid = " . $id;
        $statement = null;
        $statement = $this->DB->prepare($query);
        $statement->execute();
    }

    public function deleteEvent($eventID)
    {
        $query = "delete from events where recipe = " . $eventID;
        $statement = null;
        $statement = $this->DB->prepare($query);
        $statement->execute();
    }

}