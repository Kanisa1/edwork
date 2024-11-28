<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'edtech');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE mentors SET name='$name', email='$email', phone='$phone' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: List mentors.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM mentors WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mentor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Mentor</h2>
        <form method="post">
            <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control mb-3">
            <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control mb-3">
            <input type="tel" name="phone" value="<?php echo $row['phone']; ?>" class="form-control mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="List mentors.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
