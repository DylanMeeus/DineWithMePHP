<?php
/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 2/03/2015
 * Time: 16:13
 */

require_once "Src/db/InMemoryDB.php";

class DBFactory {

    public function getDB($_hasRDBMS)
    {
        if($_hasRDBMS)
        {
            // return online db;
        }
        else
        {
            return new InMemoryDB();
        }
        return null;
    }
}