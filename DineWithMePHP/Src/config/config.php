<?php
/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 7/03/2015
 * Time: 15:05
 */

require_once('../../db_password.php');
$dbConfig = array(
    'dbType' => 'pdo',
    'driver' => 'pgsql',
    'username' => $username,
    'password' => $password,
    'properties' => array(
        'host' => 'gegevensbanken.khleuven.be',
        'dbname' => 'probeer',
        'port' => 51415,
    )
);

?>


