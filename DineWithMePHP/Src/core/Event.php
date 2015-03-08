<?php

/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 28/02/2015
 * Time: 22:52
 */
class Event
{
    public $recipe;
    public $host;
    public $eventID;

    public function __construct($_recipe, $_host)
    {
        $this->recipe = $_recipe;
        $this->host = $_host;
    }

    public function getRecipe()
    {
        return $this->recipe;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function setID($id)
    {
        $this->eventID = $id;
    }

    public function getID()
    {
        return $this->eventID;
    }


}

?>