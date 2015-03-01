<?php

/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 28/02/2015
 * Time: 22:38
 */
require_once "Src/db/InMemoryDB.php";

class DWMFacade
{

    public $db;

    public function __construct()
    {
        $this->db = new InMemoryDB();
    }

    public function getRecipes()
    {
        return $this->db->getRecipes();
    }
}

?>