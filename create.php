<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Pet</title>
</head>
<body>
    <h1>Add Pet</h1>
    <form action="add_pet.php" method="post">
        <label>Name:</label><br>
        <input type="text" name="name"><br>
        <label>Breed:</label><br>
        <input type="text" name="breed"><br>
        <label>Age:</label><br>
        <input type="number" name="age"><br>
        <input type="submit" value="Submit">
    </form>
    <a href="index.php">Back to List</a>
</body>
</html>