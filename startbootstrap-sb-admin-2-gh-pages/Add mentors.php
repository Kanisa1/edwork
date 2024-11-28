<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="row">
            <div class="col-12">
                <form action="" method="post" class="p-4 bg-white rounded shadow">
                    <input type="text" name="name" placeholder="Mentor's full name" class="form-control mb-3">
                    <input type="email" name="email" placeholder="Mentor's email" class="form-control mb-3">
                    <input type="tel" name="phone" placeholder="Mentor's tel" class="form-control mb-3">
                    <button type="submit" name="submit" class="btn btn-primary w-100">Add</button>
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];

                    // Database connection
                    $conn = new mysqli('localhost', 'root', '', 'edtech');

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Insert query without `id` and `created_at` if they are auto-increment or default
                    $sql = "INSERT INTO `mentors`(`name`, `email`, `phone`) VALUES ('$name','$email','$phone')";

                    if ($conn->query($sql) === TRUE) {
                        // Redirect to List mentors page
                        header("Location: List mentors.php"); 
                        exit();  // Ensure no further code is executed after redirection
                    } else {
                        echo "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
                    }

                    $conn->close();
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
