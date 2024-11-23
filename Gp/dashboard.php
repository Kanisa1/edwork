<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EduTech User Dashboard</title>

  <!-- Bootstrap & Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <style>
    /* General Styling */
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f8f9fa;
      transition: background-color 0.3s ease;
    }

    /* Sidebar Styling */
    .sidebar {
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      background-color: #343a40;
      color: #ffffff;
      padding: 1rem;
    }

    .sidebar h4 {
      color: #f8f9fa;
      text-align: center;
    }

    .sidebar a {
      color: #adb5bd;
      text-decoration: none;
    }

    .sidebar a:hover {
      color: #ffffff;
    }

    /* Add this to style sidebar icons */
    .sidebar i {
      color: gold;
    }

    .sidebar a:hover i {
      color: #ffffff;
    }

    /* Content Styling */
    .content {
      margin-left: 260px;
      padding: 1.5rem;
    }

    /* Cards Styling */
    .card {
      height: 200px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: scale(1.02);
    }

    .hidden {
      display: none;
    }

    /* Dark Mode */
    .dark-mode {
      background-color: #121212;
      color: #ffffff;
    }

    .dark-mode .sidebar {
      background-color: #222831;
    }

    .dark-mode .card {
      background-color: #333844;
      color: #ffffff;
    }

    .dark-mode .btn-warning {
      background-color: #ff8c00;
      border-color: #ff8c00;
      color: #ffffff;
    }
  </style>
</head>

<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h4>EduTech Dashboard</h4>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="#" class="nav-link active" data-section="overview"><i class="fas fa-tachometer-alt me-2"></i> Overview</a>
      </li>
      <li class="nav-item">
        <a href="profile.php" class="nav-link"><i class="fas fa-user me-2"></i> Profile</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link" data-section="departments"><i class="fas fa-building me-2"></i> Departments</a>
      </li>
      
      <li class="nav-item">
        <a href="#" class="nav-link" data-section="mentors"><i class="fas fa-user-tie me-2"></i> Mentors</a>
      </li>
      
      <li class="nav-item">
        <a href="#" class="nav-link" data-section="services"><i class="fas fa-concierge-bell me-2"></i> Services</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link" data-section="settings"><i class="fas fa-cog me-2"></i> Settings</a>
      </li>
      <a href="logout.php" onclick="return confirmLogout();" class="btn btn-danger mt-3"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="content">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1>Welcome to EduTech Dashboard</h1>
      <button id="darkModeToggle" class="btn btn-outline-secondary">
        <i class="fas fa-moon"></i> Toggle Dark Mode
      </button>
    </div>

    <!-- Overview Section -->
    <div id="overview" class="row">
      <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
          <h5 class="card-title">Profile</h5>
          <p class="card-text">Manage your profile effectively.</p>
          <a href="profile.php" class="btn btn-warning">View Profile</a>
        </div>
      </div>

      <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
          <h5 class="card-title">Departments</h5>
          <p class="card-text">Explore the various departments.</p>
          <a href="departments.php" class="btn btn-warning">View Departments</a>
        </div>
      </div>

      <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
          <h5 class="card-title">Mentors</h5>
          <p class="card-text">View our able mentors' profiles.</p>
          <a href="mentors.php" class="btn btn-warning">View Mentors</a>
        </div>
      </div>
      
      <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
          <h5 class="card-title">Settings</h5>
          <p class="card-text">Manage your settings effectively.</p>
          <a href="settings.php" class="btn btn-warning">View Settings</a>
        </div>
      </div>
    </div>

    <!-- Individual Sections -->
    <div id="mentors" class="row hidden">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <h5 class="card-title">Mentors</h5>
          <p class="card-text">View our able mentors' profiles.</p>
          <a href="mentors.php" class="btn btn-warning">View Mentors</a>
        </div>
      </div>
    </div>

    <div id="departments" class="row hidden">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <h5 class="card-title">Departments</h5>
          <p class="card-text">Explore the various departments.</p>
          <a href="departments.php" class="btn btn-warning">View Departments</a>
        </div>
      </div>
    </div>

    <div id="services" class="row hidden">
      <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
          <h5 class="card-title">Web Development</h5>
          <p class="card-text">Empowering businesses with top-notch web solutions.</p>
          <a href="service-details.php" class="btn btn-warning">Learn More</a>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
          <h5 class="card-title">Consulting Services</h5>
          <p class="card-text">Get expert advice for your digital transformation journey.</p>
          <a href="service-details.php" class="btn btn-warning">Learn More</a>
        </div>
      </div>
    </div>

    <div id="settings" class="row hidden">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <h5 class="card-title">Settings</h5>
          <p class="card-text">Manage your settings effectively.</p>
          <a href="settings.php" class="btn btn-warning">View Settings</a>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script>
    // Logout Confirmation
    function confirmLogout() {
      return confirm('Are you sure you want to log out?');
    }

    // Dark Mode Toggle
    const darkModeToggle = document.getElementById('darkModeToggle');
    darkModeToggle.addEventListener('click', () => {
      document.body.classList.toggle('dark-mode');
    });

    // Section Toggle for sidebar links
    document.querySelectorAll('.sidebar a[data-section]').forEach(link => {
      link.addEventListener('click', function (event) {
        event.preventDefault();

        // Hide all sections
        document.querySelectorAll('.content > div').forEach(section => {
          section.classList.add('hidden');
        });

        // Show the selected section
        const sectionId = this.getAttribute('data-section');
        document.getElementById(sectionId).classList.remove('hidden');
      });
    });
  </script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
