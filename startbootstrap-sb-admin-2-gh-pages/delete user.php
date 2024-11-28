<?php
$conn = new mysqli('localhost', 'root', '', 'edtech');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "User deleted successfully.";
    header("Location: List users.php");
    exit();
} else {
    echo "Error deleting user: " . $conn->error;
}

$conn->close();
?>
