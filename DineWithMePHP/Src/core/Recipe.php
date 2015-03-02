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
    public $instructions;
    public $ingredients;


    public function __construct($_name, $_people, $_instructions, $_ingredients)
    {
        $this->name=$_name;
        $this->people = $_people;
        $this->instructions = $_instructions;
        $this->ingredients = $_ingredients;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPeople(){
        return $this->people;
    }

    public function setName($_name){
        $this->$name = $_name;
    }

    public function setPeople($_people){
        $this->$people = $_people;
    }

    public function setInstructions($_instructions){
        $this->instructions = $_instructions;
    }

    public function setIngredients($_ingredients){
        $this->ingredients = $_ingredients;
    }
}
?>