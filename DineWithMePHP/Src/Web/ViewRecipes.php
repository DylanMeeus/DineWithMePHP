<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>DWMPHP</title>
    <script src="Src/js/forms.js"></script>
</head>
<body>

<h1> View recipes </h1>


<h2>What would you like to do?</h2>
<a href="index.php?action=viewrecipes">View recipes</a>
<a href="index.php?action=viewevents">View events</a>

<h2>Recipes</h2>

<form method="post" action="deleteRecord">
<table border="1">
    <?php foreach ($this->recipes as $recipe) { ?>
        <tr>
            <td><?php echo $recipe->getName() ?></td>
            <td> <?php echo $recipe->getPeople() ?></td>
        </tr>
    <?php }
    ?>
</form>
    <!-- let's try to fancy this up a bit -->


</table>
<input type="button" value="+" onclick="showRecipeAddForm()" id="addbutton">
</body>
</html>