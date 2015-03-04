<?php

/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 2/03/2015
 * Time: 16:20
 */
interface IDatabase
{
    public function getEvents();

    public function getRecipes();

    public function addRecipe($recipe);

    public function addEvent($recipe);
}

?>