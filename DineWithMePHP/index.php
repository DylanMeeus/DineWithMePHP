
<?php
require_once "Src/config/config.php";
require_once 'Src/controller/Servlet.php';
$servlet = new Servlet($dbConfig);
$servlet->processRequest();
?>