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
    $sql = "DELETE FROM pets WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Pet</title>
</head>
<body>
    <h1>Delete Pet</h1>
    <p>Are you sure you want to delete <?php echo $row['name']; ?>?</p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $id; ?>">
        <input type="submit" value="Delete">
        <a href="index.php">Cancel</a>
    </form>
</body>
</html>