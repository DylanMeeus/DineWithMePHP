<?php

/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 28/02/2015
 * Time: 22:51
 */
class Recipe
{
    public $name;
    public $people;
    public $recipeID;

    public function __construct($_name, $_people)
    {
        $this->name = $_name;
        $this->people = $_people;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPeople()
    {
        return $this->people;
    }

    public function setName($_name)
    {
        $this->$name = $_name;
    }

    public function setPeople($_people)
    {
        $this->$people = $_people;
    }

    public function setID($id)
    {
        $this->recipeID = $id;
    }

    public function getID()
    {
        return $this->recipeID;
    }
}

?>