<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .cover-frame {
            border: 2px solid #007bff;
            border-radius: 8px;
            overflow: hidden;
            height: 250px;
            width: 100%;
            max-width: 100%;
            display: block;
            position: relative;
            cursor: pointer;
        }

        .profile-frame {
            border: 3px solid #6c757d;
            border-radius: 50%;
            overflow: hidden;
            width: 150px;
            height: 150px;
            margin: auto;
            cursor: pointer;
        }

        img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        input[type="file"] {
            display: none;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <?php
    // Database connection
    $con = mysqli_connect("sql301.infinityfree.com", "if0_37766648", "0yVYU6zbOgG9V0", "if0_37766648");
    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Fetch user ID (use session or query parameter in a real application)
    $userId = 1; // Replace with the actual user ID, e.g., from session

    // Fetch user data
    $sql = "SELECT * FROM profile WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $userData = $result->fetch_assoc();

    // Set default values if data is missing
    $fullName = $userData['full_name'] ?? '';
    $email = $userData['email'] ?? '';
    $sex = $userData['sex'] ?? '';
    $about = $userData['about'] ?? '';
    $profilePicturePath = $userData['profile_picture'] ?? 'default-profile.jpg';
    $coverPicturePath = $userData['cover_picture'] ?? 'default-cover.jpg';

    // Handle form submission
    if (isset($_POST['submit'])) {
        $fullName = $_POST['full_name'];
        $email = $_POST['email'];
        $sex = $_POST['sex'];
        $about = $_POST['about'];

        // Handle profile picture upload
        if (!file_exists('uploads')) {
            mkdir('uploads', 0777, true);  // Create the 'uploads' folder if it doesn't exist
        }

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];  // Allowed file types
        $maxFileSize = 5 * 1024 * 1024;  // Max file size (5MB)

        // Profile Picture Validation
        if (!empty($_FILES['profile_picture']['name'])) {
            $fileType = $_FILES['profile_picture']['type'];
            $fileSize = $_FILES['profile_picture']['size'];
            if (in_array($fileType, $allowedTypes) && $fileSize <= $maxFileSize) {
                $profilePicturePath = 'uploads/' . basename($_FILES['profile_picture']['name']);
                move_uploaded_file($_FILES['profile_picture']['tmp_name'], $profilePicturePath);
            } else {
                echo "<div class='alert alert-danger'>Invalid profile picture. Please upload a valid image (JPEG, PNG, GIF) under 5MB.</div>";
            }
        }

        // Cover Picture Validation
        if (!empty($_FILES['cover_picture']['name'])) {
            $fileType = $_FILES['cover_picture']['type'];
            $fileSize = $_FILES['cover_picture']['size'];
            if (in_array($fileType, $allowedTypes) && $fileSize <= $maxFileSize) {
                $coverPicturePath = 'uploads/' . basename($_FILES['cover_picture']['name']);
                move_uploaded_file($_FILES['cover_picture']['tmp_name'], $coverPicturePath);
            } else {
                echo "<div class='alert alert-danger'>Invalid cover picture. Please upload a valid image (JPEG, PNG, GIF) under 5MB.</div>";
            }
        }

        // Update data in the database
        $sql = "UPDATE profile SET full_name = ?, email = ?, sex = ?, about = ?, profile_picture = ?, cover_picture = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssi", $fullName, $email, $sex, $about, $profilePicturePath, $coverPicturePath, $userId);
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Profile updated successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error updating profile: " . $stmt->error . "</div>";
        }
    }

    // Close the connection
    $stmt->close();
    mysqli_close($con);
    ?>

    <!-- Cover Picture -->
    <label class="cover-frame" for="uploadCover">
        <img id="coverPicture" src="<?php echo htmlspecialchars($coverPicturePath); ?>" alt="Cover Picture">
        <input type="file" id="uploadCover" name="cover_picture" onchange="previewImage(event, 'coverPicture')">
    </label>

    <!-- Profile Picture -->
    <label class="profile-frame mt-4" for="uploadProfile">
        <img id="profilePicture" src="<?php echo htmlspecialchars($profilePicturePath); ?>" alt="Profile Picture">
        <input type="file" id="uploadProfile" name="profile_picture" onchange="previewImage(event, 'profilePicture')">
    </label>

    <!-- Personal Information Form -->
    <form id="profileForm" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="fullName" class="form-label">Full Name</label>
            <input type="text" id="fullName" name="full_name" class="form-control" value="<?php echo htmlspecialchars($fullName); ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>">
        </div>
        <div class="mb-3">
            <label for="sex" class="form-label">Sex</label>
            <select id="sex" name="sex" class="form-control">
                <option value="Male" <?php echo ($sex === 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($sex === 'Female') ? 'selected' : ''; ?>>Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="about" class="form-label">About Me</label>
            <textarea id="about" name="about" class="form-control"><?php echo htmlspecialchars($about); ?></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Save Profile</button>
    </form>
</div>

<script>
    function previewImage(event, imgId) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById(imgId).src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>
</body>
</html>
