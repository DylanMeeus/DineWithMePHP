<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>DWMPHP</title>
    <script>

        function showEventAddForm() {
            var addButton = document.getElementById("addbutton");
            if (addButton.getAttribute("value") == "+") {
                var phpbox = document.getElementById('phpbox').hidden = false;
                var form = document.createElement('form');
                form.setAttribute("id","addForm");
                form.setAttribute('method', 'post');
                form.setAttribute('action', 'index.php?action=addEvent');
                var fieldset = document.createElement('fieldset');

                var hostLabel = document.createElement('label');
                hostLabel.textContent = "Host";
                var hostTextField = document.createElement("input");
                hostTextField.setAttribute("type", "text");
                hostTextField.setAttribute('name', 'host');
                hostLabel.appendChild(hostTextField);

                // button
                var createButton = document.createElement("input");
                createButton.setAttribute("type","submit");
                createButton.setAttribute("value","Save");

                // add to fieldset & fieldset to form
                fieldset.appendChild(hostLabel);
                fieldset.appendChild(document.getElementById('phpbox')); // change the parent of the div, to be inside the fieldset.
                fieldset.appendChild(createButton);
                form.appendChild(fieldset);
                document.getElementsByTagName('body')[0].appendChild(form);
                addButton.setAttribute("value", "-");
            }
            else
            {
                addButton.setAttribute("value","+");
                var form = document.getElementById(addForm);
                while(form.firstChild)
                {
                    form.removeChild(form.firstChild);
                }
                document.getElementsByTagName("body")[0].removeChild(form);
            }

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
    <?php foreach ($this->events as $event) {
        ?>
        <tr>
        <td> <?php echo $event->getHost() ?> </td>
        <td><?php echo $event->getRecipe()->getName() ?></td>
        </tr><?php
    } ?>
</table>

<input type="button" onclick="showEventAddForm()" id="addbutton" value="+"/>

<!-- mess around with some PHP/Javascript to fill a combobox -->
<div id="phpbox" hidden="true" >
    <?php
    echo '<label> Recipe';
    echo '<select name="selectedRecipe" id="selectedRecipe">';
    foreach ($this->recipes as $recipe) {
        echo "<option>{$recipe->getName()}</option>";
    }
    echo '</select>';
    echo '</label>';
    ?>
</div>


</body>
</html>