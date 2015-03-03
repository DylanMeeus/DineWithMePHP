
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>DWMPHP</title>
    <script scr="Src/js/forms.js"></script>
</head>

<body>

<h1>View events</h1>
<a href="index.php?action=createevents">Create event</a>
<a href="index.php?action=createrecipes">Create Recipes</a>
<a href="index.php?action=viewrecipes">View recipes</a>
<a href="index.php?action=viewevents">View events</a>

<h2>Events</h2>
<table border="1">
    <?php foreach($this->events as $event)
    {?>
        <tr>
        <td> <?php echo $event->getHost() ?> </td> <td><?php echo $event->getRecipe()->getName() ?></td>
        </tr><?php
    }?>
</table>

<input type="button" onclick="showEventAddForm()" value="+">

</body>
</html>