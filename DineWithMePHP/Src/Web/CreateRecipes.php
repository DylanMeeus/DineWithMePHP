
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>CreateRecipe</title>
</head>

<body>

<h1> Create recipes </h1>

<h2>What would you like to do?</h2>

<a href="index.php?action=createevents">Create event</a>
<a href="index.php?action=createrecipes">Create Recipes</a>
<a href="index.php?action=viewrecipes">View recipes</a>
<a href="index.php?action=viewevents">View events</a>

<h2>Create</h2>

<form role="form" method="POST" action="index.php?action=addRecipe">
    <fieldset>
        <label>Name <input type="text" name="name" id="name"></label>
        <label>People <input type="text" id="people" name="people"></label>
        <input type="submit" value="add">
    </fieldset>
</form>

</body>
</html>