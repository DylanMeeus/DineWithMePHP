<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>DWMPHP</title>
    <script>
        function showEventAddForm() {

            var phpbox = document.getElementById('phpbox').hidden = false;

            var form = document.createElement('form');
            form.setAttribute('method','post');
            form.setAttribute('action','index.php?action=addEvent');
            var fieldset = document.createElement('fieldset');

            var hostLabel = document.createElement('label');
            hostLabel.textContent = "Host";
            var hostTextField = document.createElement("input");
            hostTextField.setAttribute("type", "text");
            hostTextField.setAttribute('name', 'host');
            hostLabel.appendChild(hostTextField);



            // add to fieldset & fieldset to form
            fieldset.appendChild(hostLabel);
            fieldset.appendChild(document.getElementById('phpbox')); // change the parent of the div, to be inside the fieldset.
            form.appendChild(fieldset);
            document.getElementsByTagName('body')[0].appendChild(form);
        }
    </script>
</head>

<body>

<h1>View events</h1>
<a href="index.php?action=createevents">Create event</a>
<a href="index.php?action=createrecipes">Create Recipes</a>
<a href="index.php?action=viewrecipes">View recipes</a>
<a href="index.php?action=viewevents">View events</a>

<h2>Events</h2>
<table border="1">
    <?php foreach ($this->events as $event)
    {
        ?>
        <tr>
        <td> <?php echo $event->getHost() ?> </td>
        <td><?php echo $event->getRecipe()->getName() ?></td>
        </tr><?php
    } ?>
</table>

<input type="button" onclick="showEventAddForm()" value="+"/>

<!-- mess around with some PHP/Javascript to fill a combobox -->
<div id="phpbox" hidden="true" name="selectedRecipe">
<?php
echo '<label> Recipe';
echo '<select>';
foreach($this->recipes as $recipe)
{
    echo "<option>{$recipe->getName()}</option>";
}
echo '</select>';
echo '</label>';
?>
</div>


</body>
</html>