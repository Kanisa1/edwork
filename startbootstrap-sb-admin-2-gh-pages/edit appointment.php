<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'edtech');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the mentor ID from the URL
$id = $_GET['id'];

// Fetch existing data
$sql = "SELECT * FROM mentor1 WHERE id = $id";
$result = $conn->query($sql);
$mentor = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $interest = $_POST['interest'];

    // Update query
    $updateSql = "UPDATE mentor1 SET name='$name', email='$email', phone='$phone', interest='$interest' WHERE id=$id";

    if ($conn->query($updateSql) === TRUE) {
        echo "Mentor updated successfully!";
        header("Location: mentor_management.php"); // Redirect to the main page
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mentor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Edit Mentor</h2>
    <form method="POST" class="p-4 bg-light rounded">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $mentor['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $mentor['email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" name="phone" class="form-control" value="<?php echo $mentor['phone']; ?>" required>
        </div>
        <div class="form-group">
            <label for="interest">Interest</label>
            <input type="text" name="interest" class="form-control" value="<?php echo $mentor['interest']; ?>">
        </div>
        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="List appointment.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>

<?php $conn->close(); ?>
