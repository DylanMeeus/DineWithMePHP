

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>DWMPHP</title>
</head>

<body>

<h1> View recipes </h1>



<h2>What would you like to do?</h2>
<a href="index.php?action=createevents">Create event</a>
<a href="index.php?action=createrecipes">Create Recipes</a>
<a href="index.php?action=viewrecipes">View recipes</a>
<a href="index.php?action=viewevents">View events</a>

<h2>Recipes</h2>

<table border="1">
<?php foreach($this->recipes as $recipe) {?>
<tr>
    <td><?php echo $recipe->getName() ?></td> <td> <?php echo $recipe->getPeople() ?></td>
</tr>
<?php }
?>

</table>
</body>
</html>