<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
</head>
<body>
    <h1>Error</h1>
    <p><?php echo isset($_GET['message']) ? $_GET['message'] : "An error occurred"; ?></p>
    <a href="index.php">Back to Home</a>
</body>
</html>