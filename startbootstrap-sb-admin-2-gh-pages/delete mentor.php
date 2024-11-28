<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'edtech');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "DELETE FROM mentors WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header("Location: List mentors.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
