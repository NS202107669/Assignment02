<?php include 'config.php'; ?>
<?php
$sql = "SELECT * FROM pets";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pet List</title>
</head>
<body>
    <h1>Pet List</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Breed</th>
            <th>Age</th>
            <th>Action</th>
        </tr>
        <?php 
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["breed"] . "</td>";
                echo "<td>" . $row["age"] . "</td>";
                echo "<td>";
                echo "<a href='read.php?id=" . $row["id"] . "'>View</a> | ";
                echo "<a href='update.php?id=" . $row["id"] . "'>Edit</a> | ";
                echo "<a href='delete.php?id=" . $row["id"] . "'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No pets found</td></tr>";
        }
        ?>
    </table>


<!DOCTYPE html>
<html>
<head>
    <title>Add Pet</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CSS -->
</head>
<body>
    <h1>Add Pet</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $breed = $_POST['breed'];
        $age = $_POST['age'];

        $sql = "INSERT INTO pets (name, breed, age) VALUES ('$name', '$breed', '$age')";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Data successfully inserted!</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
         <label>Name:</label><br>
        <input type="text" name="name"><br>
        <label>Breed:</label><br>
        <input type="text" name="breed"><br>
        <label>Age:</label><br>
        <input type="number" name="age"><br>
        <button type="submit"><i class="fas fa-plus"></i> Submit</button> <!-- Submit button with icon -->
    </form>
</body>
</html>