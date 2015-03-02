
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>DWMPHP</title>
</head>

<body>

<?php
require_once "Src/core/DWMFacade.php";
//$facade = new DWMFacade();
?>

<h1>View events</h1>

<a href="index.php?action=createevents">Create event</a>
<a href="index.php?action=createrecipes">Create Recipes</a>
<a href="index.php?action=viewrecipes">View recipes</a>
<a href="index.php?action=viewevents">View events</a>

<h2>Events</h2>

<table border="1">
<?php foreach($facade->getEvents() as $event)
{?>
    <tr>
    <td> <?php echo $event->getHost() ?> </td> <td><?php echo $event->getRecipe()->getName() ?></td>
    </tr><?php
}?>
</table>
</body>
</html>