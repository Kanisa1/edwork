<?php
// Start session to retain active tab
session_start();

// Simulated user data (replace with database queries in production)
$userData = [
    'username' => 'John Doe',
    'email' => 'johndoe@example.com',
    'profile_visibility' => true,
    'email_notifications' => true,
    'sms_notifications' => false,
];

// Feedback messages
$feedback = '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .nav-item a {
            padding: 10px;
            display: block;
            text-decoration: none;
            color: #000;
            transition: background 0.3s, color 0.3s;
        }

        .nav-item a.active {
            background: #007bff;
            color: #fff;
            font-weight: bold;
            border-radius: 5px;
        }

        .section {
            display: none;
        }

        .section.active {
            display: block;
        }

        .btn {
            margin-top: 20px;
        }

        .alert {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Settings</h1>
    <?php if ($feedback): ?>
        <div class="alert alert-info"><?= $feedback ?></div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-3">
            <!-- Sidebar Navigation -->
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="#profile-settings" class="nav-link active" data-section="profile-settings">Profile Settings</a>
                </li>
                <li class="nav-item">
                    <a href="#notification-settings" class="nav-link" data-section="notification-settings">Notification Settings</a>
                </li>
                <li class="nav-item">
                    <a href="#security-settings" class="nav-link" data-section="security-settings">Security Settings</a>
                </li>
                <li class="nav-item">
                    <a href="#privacy-settings" class="nav-link" data-section="privacy-settings">Privacy Settings</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <!-- Profile Settings -->
            <div id="profile-settings" class="section active">
                <h3>Profile Settings</h3>
                <form method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                               value="<?= htmlspecialchars($userData['username']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="<?= htmlspecialchars($userData['email']) ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>

            <!-- Notification Settings -->
            <div id="notification-settings" class="section">
                <h3>Notification Settings</h3>
                <form method="POST">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="email_notifications" name="email_notifications"
                               <?= $userData['email_notifications'] ? 'checked' : '' ?>>
                        <label class="form-check-label" for="email_notifications">Email Notifications</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sms_notifications" name="sms_notifications"
                               <?= $userData['sms_notifications'] ? 'checked' : '' ?>>
                        <label class="form-check-label" for="sms_notifications">SMS Notifications</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>

            <!-- Security Settings -->
            <div id="security-settings" class="section">
                <h3>Security Settings</h3>
                <form method="POST">
                    <div class="mb-3">
                        <label for="old_password" class="form-label">Old Password</label>
                        <input type="password" class="form-control" id="old_password" name="old_password">
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password">
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                    </div>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>

            <!-- Privacy Settings -->
            <div id="privacy-settings" class="section">
                <h3>Privacy Settings</h3>
                <form method="POST">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="profile_visibility" name="profile_visibility"
                               <?= $userData['profile_visibility'] ? 'checked' : '' ?>>
                        <label class="form-check-label" for="profile_visibility">Public Profile</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript for toggling sections
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();

            // Hide all sections
            document.querySelectorAll('.section').forEach(section => {
                section.classList.remove('active');
            });

            // Highlight active link and show the section
            document.querySelectorAll('.nav-link').forEach(nav => {
                nav.classList.remove('active');
            });
            this.classList.add('active');
            const sectionId = this.getAttribute('data-section');
            document.getElementById(sectionId).classList.add('active');
        });
    });
</script>
</body>
</html>
