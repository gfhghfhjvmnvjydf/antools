<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <header>
        <h1>Register</h1>
    </header>
    <main>
        <form action="register.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="tools">Requested Tools:</label>
            <input type="text" id="tools" name="tools" required>
            <label for="quantity">Number of Tools:</label>
            <input type="number" id="quantity" name="quantity" required>
            <label for="contact">Contact Info (Phone or Email):</label>
            <input type="text" id="contact" name="contact" required>
            <button type="submit">Register</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 AnTools</p>
    </footer>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $tools = $_POST['tools'];
    $quantity = $_POST['quantity'];
    $contact = $_POST['contact'];

    $servername = "127.0.0.1:3307";
$username = "root@";
$password = "";
$dbname = "database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO registrations (name, tools, quantity, contact)
    VALUES ('$name', '$tools', $quantity, '$contact')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
