

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>DWMPHP</title>
</head>

<body>

<h1> View recipes </h1>

<?php

require_once "Src/core/DWMFacade.php";

$facade = new DWMFacade();

foreach($facade->getRecipes() as $recipe){
    echo $recipe."\n";
}



?>

<h2>What would you like to do?</h2>
<a href="index.php?action=createevents">Create event</a>
<a href="index.php?action=createrecipes">Create Recipes</a>
<a href="index.php?action=viewrecipes">View recipes</a>
<a href="index.php?action=viewevents">View events</a>


</body>
</html>