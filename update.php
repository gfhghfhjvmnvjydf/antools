<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
    <header>
        <h1>Update User</h1>
    </header>
    <main>
        <?php
        $servername = "127.0.0.1:3307";
        $username = "root@";
        $password = "";
        $dbname = "database";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT name, tools, quantity, contact FROM registrations WHERE id=$id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<form action="update.php" method="post">
                    <input type="hidden" name="id" value="'.$id.'">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="'.$row["name"].'" required>
                    <label for="tools">Requested Tools:</label>
                    <input type="text" id="tools" name="tools" value="'.$row["tools"].'" required>
                    <label for="quantity">Number of Tools:</label>
                    <input type="number" id="quantity" name="quantity" value="'.$row["quantity"].'" required>
                    <label for="contact">Contact Info (Phone or Email):</label>
                    <input type="text" id="contact" name="contact" value="'.$row["contact"].'" required>
                    <button type="submit">Update</button>
                </form>';
            } else {
                echo "No user found";
            }
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $tools = $_POST['tools'];
            $quantity = $_POST['quantity'];
            $contact = $_POST['contact'];

            $sql = "UPDATE registrations SET name='$name', tools='$tools', quantity=$quantity, contact='$contact' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

        $conn->close();
        ?>
    </main>
    <footer>
        <p>&copy; 2024 AnTools</p>
    </footer>
</body>
</html>
