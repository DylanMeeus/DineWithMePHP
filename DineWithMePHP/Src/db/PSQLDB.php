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
            $this->DB = new PDO($connString, $dbConfig['username'], $dbConfig['password']);
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex)
        {
            error_log($ex->getMessage());
        }

    }

    public function getEvents()
    {
        // TODO: Implement getEvents() method.
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
            array_push($recipes,$recipe);
        }

        return $recipes;

    }

    public function addRecipe($recipe)
    {
        // TODO: Implement addRecipe() method.
    }

    public function addEvent($recipe)
    {
        // TODO: Implement addEvent() method.
    }
}