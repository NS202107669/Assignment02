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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pet Details</title>
</head>
<body>
    <h1>Pet Details</h1>
    <p>Name: <?php echo $row['name']; ?></p>
    <p>Breed: <?php echo $row['breed']; ?></p>
    <p>Age: <?php echo $row['age']; ?></p>
    <a href="index.php">Back to List</a>
</body>
</html>