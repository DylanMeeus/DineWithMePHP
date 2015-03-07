<?php
/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 2/03/2015
 * Time: 16:13
 */

require_once "Src/db/InMemoryDB.php";
require_once "Src/db/PSQLDB.php";
class DBFactory
{

    public function getDB($dbConfig)
    {
        $dbType = $dbConfig['dbType'];
        if ($dbType=='memory')
        {
            return new InMemoryDB();

        } else
        {
            return new PSQLDB($dbConfig);
        }
        return null;
    }
}