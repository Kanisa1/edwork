<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'edtech');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the mentor ID from the URL
$id = $_GET['id'];

// Delete query
$sql = "DELETE FROM mentor1 WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Mentor deleted successfully!";
    header("Location: List appointment.php"); // Redirect to the main page
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
