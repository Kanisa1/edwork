<?php
session_start();
$host = 'sql301.infinityfree.com';
$db = 'if0_37766648_edtech';
$user = 'if0_37766648';  // Replace with your database username
$pass = '0yVYU6zbOgG9V0';      // Replace with your database password

// Database connection
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Registration logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insert user data
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        header("Location: reg.php?message=registered");
        exit();
    } else {
        $error = "Registration failed: " . $stmt->error;
    }
    $stmt->close();
}

// Login logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php");  // Redirect to a welcome page after login
        exit();
    } else {
        $error = "Invalid username or password.";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Login & Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <div class="info-text">
            <h2 id="info-heading">WELCOME BACK!</h2>
            <p id="info-text">Please enter your correct credentials to continue your journey with us</p>
        </div>

        <div class="form-box">
            <h2 id="form-heading">Login</h2>

            <?php if (isset($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>

            <!-- Login Form -->
            <form id="loginForm" action="" method="POST">
                <input type="hidden" name="login" value="1">
                <div class="input-box">
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <button type="submit" class="btn">Login</button>
                <p class="toggle-form">Don't have an account? <a href="#" id="signUpLink">Sign Up</a></p>
            </form>

            <!-- Sign Up Form -->
            <form id="signUpForm" action="" method="POST" style="display: none;">
                <input type="hidden" name="register" value="1">
                <div class="input-box">
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <button type="submit" class="btn">Sign Up</button>
                <p class="toggle-form">Already have an account? <a href="#" id="loginLink">Login</a></p>
            </form>
        </div>
    </div>

    <!-- JavaScript for Pop-up Notification -->
    <script>
        // Check if the URL has the 'message=registered' parameter
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('message') === 'registered') {
            alert('Registration successful! Please login.');
        }

        // Toggle between Login and Sign Up forms
        document.getElementById('signUpLink').addEventListener('click', function() {
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('signUpForm').style.display = 'block';
        });

        document.getElementById('loginLink').addEventListener('click', function() {
            document.getElementById('signUpForm').style.display = 'none';
            document.getElementById('loginForm').style.display = 'block';
        });
    </script>
</body>
</html>
