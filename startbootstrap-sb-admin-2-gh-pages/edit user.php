<?php
$conn = new mysqli('localhost', 'root', '', 'edtech');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET username='$username', email='$email' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully.";
        header("Location: List users.php");
        exit();
    } else {
        echo "Error updating user: " . $conn->error;
    }
}

$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User</title>
</head>
<body>
    <form method="post">
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo $user['username']; ?>" required><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
