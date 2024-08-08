<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="users.css">
</head>
<body>
    <header>
        <h1>Registered Users</h1>
    </header>
    <main>
        <table>
            <tr>
                <th>Name</th>
                <th>Requested Tools</th>
                <th>Quantity</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
            <?php
$servername = "127.0.0.1:3307";
$username = "root@";
$password = "";
$dbname = "database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, tools, quantity, contact FROM registrations";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"]. "</td><td>" . $row["tools"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["contact"]. "</td><td><a href='update.php?id=".$row["id"]."'>Update</a> | <a href='delete.php?id=".$row["id"]."'>Delete</a></td></tr>";
    }
} else {
    echo "<tr><td colspan='5'>No users found</td></tr>";
}

$conn->close();
?>

        </table>
    </main>
    <footer>
        <p>&copy; 2024 AnTools</p>
    </footer>
</body>
</html>
