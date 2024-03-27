<?php 
include 'config.php'; 

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM pets WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        header("Location: error.php?message=Pet not found");
        exit();
    }
} else {
    header("Location: error.php?message=Invalid request");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];

    $sql = "UPDATE pets SET name='$name', breed='$breed', age='$age' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: read.php?id=$id");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pet</title>
</head>
<body>
    <h1>Edit Pet</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $id; ?>" method="post">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
        <label>Breed:</label><br>
        <input type="text" name="breed" value="<?php echo $row['breed']; ?>"><br>
        <label>Age:</label><br>
        <input type="number" name="age" value="<?php echo $row['age']; ?>"><br>
        <input type="submit" value="Update">
    </form>
    <a href="index.php">Back to List</a>
</body>
</html>